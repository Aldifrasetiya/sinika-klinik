<?php
// Koneksi ke database (ganti sesuai konfigurasi database Anda)
include "config/db-klinik.php";

// // Mendapatkan ID pasien terbesar dari database
// $query = mysqli_query($db_connect, "SELECT max(id_antrian) as idTerbesar FROM antrian");
// $data = mysqli_fetch_array($query);

// // Mengenerate ID pasien baru
// $urutan = (int) substr($data['idTerbesar'], 3, 4) + 1;
// $id_antrian_baru = "ATR" . sprintf("%04d", $urutan);

// // Menampilkan ID pasien baru (opsional)
// echo $id_antrian_baru;

if (isset($_POST['DaftarAntrian'])) {
    $nama_pasien = $_POST['nama'];
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

// hapus jadwal dokter
if (isset($_GET['no_antrian'])) {
    mysqli_query($db_connect, "DELETE FROM antrian WHERE no_antrian='$_GET[no_antrian]'");

    header("Location: ../pages/content/admin/m_data_antrian.php");
    exit();
}


// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DaftarAntrian'])) {
//     $nama = $_POST['nama'];
//     $id_dokter = $_POST['id_dokter'];

//     // Simpan data pasien ke database
//     $sqlPasien = "INSERT INTO pasien (nama) VALUES ('$nama')";
//     $db_connect->query($sqlPasien);
//     $id_pasien = $db_connect->insert_id;

//     // Simpan data antrian ke database
//     $sqlAntrian = "INSERT INTO antrian (atas_nama_pasien, id_dokter, id_pasien) VALUES ('$nama', '$id_dokter', '$id_pasien')";
//     $db_connect->query($sqlAntrian);
//     $nomor_antrian = $db_connect->insert_id;

//     // Redirect ke halaman informasi antrian dengan membawa nomor antrian
//     header("Location: p_halaman_antrian.php?nomor_antrian=$nomor_antrian&id_pasien=$id_pasien");
//     exit();
// }

// if (isset($_GET['nomor_antrian']) && isset($_GET['id_pasien'])) {
//     $nomor_antrian = $_GET['nomor_antrian'];
//     $id_pasien = $_GET['id_pasien'];

//     // Ambil informasi pasien
//     $sqlInfoPasien = "SELECT nama FROM pasien WHERE id_pasien = $id_pasien";
//     $result = $db_connect->query($sqlInfoPasien);
//     $row = $result->fetch_assoc();
//     $pasien = $row['nama'];
// } else {
//     echo "Tidak ada informasi antrian yang valid.";
//     exit();
// }

?>