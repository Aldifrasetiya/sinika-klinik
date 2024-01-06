<?php
// Koneksi ke database (ganti sesuai konfigurasi database Anda)
include "config/db-klinik.php";

if (isset($_POST['DaftarAntrian'])) {
    $nama_pasien = $_POST['nama_pasien'];
    $id_dokter = $_POST['id_dokter'];

    // Ambil nomor antrian secara otomatis
    $result = $db_connect->query("SELECT MAX(no_antrian) as max_antrian FROM antrian");
    $row = $result->fetch_assoc();
    $nomor_antrian = $row['max_antrian'] + 1;

    // Simpan data ke database
    $query = "INSERT INTO antrian (no_antrian, atas_nama_pasien, id_dokter) VALUES (?, ?, ?)";
    $stmt = $db_connect->prepare($query);
    $stmt->bind_param("isi", $nomor_antrian, $nama_pasien, $id_dokter);
    $stmt->execute();
    $stmt->close();

    // Periksa apakah data berhasil disimpan
    if ($stmt) {
        echo "Pendaftaran berhasil. Nomor Antrian Anda: $nomor_antrian";
    } else {
        echo "Error: " . $query . "<br>" . $db_connect->error;
    }

    header("Location: ../pages/content/pasien/p_halaman_antrian.php?nomor_antrian={$nomor_antrian}&id_pasien={$id_pasien}");
    exit();
}
// edit status antrian
if (isset($_POST['editAntrian'])) {
    $nomor_antrian_selesai = $_POST['noAntrian']; // Ganti dengan nomor antrian yang sesuai
    $status_selesai = $_POST['statusAntrian'];

    $queryUpdateStatus = "UPDATE antrian SET status_antrian = ? WHERE no_antrian = ?";
    $stmt = $db_connect->prepare($queryUpdateStatus);
    $stmt->bind_param("si", $status_selesai, $nomor_antrian_selesai);
    $stmt->execute();
    $stmt->close();

    header("Location: ../pages/content/admin/m_data_antrian.php");
    exit();
}

// hapus data antrian
if (isset($_GET['no_antrian'])) {
    mysqli_query($db_connect, "DELETE FROM antrian WHERE no_antrian='$_GET[no_antrian]'");

    header("Location: ../pages/content/admin/m_data_antrian.php");
    exit();
}
?>