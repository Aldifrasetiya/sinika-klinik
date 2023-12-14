<?php

include "config/db-klinik.php";

$QueryDataObat = mysqli_query($db_connect, "SELECT * FROM obat");

// tambah jadwal dokter php
if (isset($_POST["Tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jenis = mysqli_real_escape_string($db_connect, $_POST['jenis']);
    $harga = mysqli_real_escape_string($db_connect, $_POST['harga']);
    $stok = mysqli_real_escape_string($db_connect, $_POST['stok']);

    $QueryAddObat = "INSERT INTO obat(nama_obat, jenis_obat, harga, stok) VALUES('" . $nama_obat . "','" . $jenis . "','" . $harga . "','" . $stok . "')";

    $ResultQueryObat = mysqli_query($db_connect, $QueryAddObat);

    header("Location: ../pages/content/admin/m_data_obat.php");
}

// // edit jadwal dokter
// if (isset($_POST["UbahJadwal"])) {
//     global $db_connect;
//     // Ambil data dari formulir
//     $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
//     $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
//     $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
//     $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
//     $hp = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);
//     $jp = mysqli_real_escape_string($db_connect, $_POST['jamPraktek']);

//     $queryUpdateDokter = "UPDATE jadwal_dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', no_hp='$no_tlp', hari_praktek='$hp', jam_praktek='$jp' WHERE id_dokter='$id_dokter'";

//     $resultUpdateDokter = mysqli_query($db_connect, $queryUpdateDokter);

//     // var_dump($id_dokter);
//     // die;

//     header("Location: ../pages/content/admin/m_dokter_umum.php");
// }

// // hapus jadwal dokter
// if (isset($_GET['id_dokter'])) {
//     mysqli_query($db_connect, "DELETE FROM jadwal_dokter WHERE id_dokter='$_GET[id_dokter]'");

//     header("Location: ../pages/content/admin/m_dokter_umum.php");
//     die();
// }


?>