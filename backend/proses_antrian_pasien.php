<?php

// Koneksi ke database (ganti sesuai konfigurasi database Anda)
require_once("config/db-klinik.php");

function daftarAntrian()
{
    // Logika untuk pendaftaran antrian (simulasi, sesuaikan dengan kebutuhan Anda)
    $nomor_antrian = rand(100, 999); // Nomor antrian di-generate secara acak
    // Simpan data pendaftaran ke database atau file jika diperlukan
    $query = "INSERT INTO antrian (ID_Antrian) VALUES ('$nomor_antrian')";

    return $nomor_antrian;
}

// Periksa koneksi
if ($db_connect->connect_error) {
    die('Koneksi database gagal: ' . $db_connect->connect_error);
}
if (isset($_POST['DaftarAntrian'])) {
    $nomor_antrian = daftarAntrian();
    $nama_pasien = $_POST['nama_pasien'];

    // Ambil nomor antrian secara otomatis (contoh sederhana, bisa disesuaikan)
    $result = $db_connect->query("SELECT MAX(ID_Antrian) as max_antrian FROM antrian");
    $row = $result->fetch_assoc();
    $nomor_antrian = $row['max_antrian'] + 1;

    // Simpan data ke database
    $query = "INSERT INTO antrian (ID_Antrian, ID_Pasien) VALUES ('$nama_pasien', '$nomor_antrian')";
    $result = $db_connect->query($query);

    // Periksa apakah data berhasil disimpan
    if ($result) {
        echo "Pendaftaran berhasil. Nomor Antrian Anda: $nomor_antrian";
    } else {
        echo "Error: " . $query . "<br>" . $db_connect->error;
    }
    header("Location: ../pages/content/pasien/p_halaman_antrian.php?nomor_antrian={$nomor_antrian}");
    exit();
}

// Tutup db_connect$db_connect ke database
$db_connect->close();
?>





























// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// // Proses pendaftaran antrian
// $nomor_antrian = daftarAntrian();

// echo "Anda telah berhasil mendaftar antrian. Nomor Antrian Anda: $nomor_antrian";
// }

// function daftarAntrian() {
// // Logika untuk pendaftaran antrian (simulasi, sesuaikan dengan kebutuhan Anda)
// $nomor_antrian = rand(100, 999); // Nomor antrian di-generate secara acak
// // Simpan data pendaftaran ke database atau file jika diperlukan

// return $nomor_antrian;
// }

?>