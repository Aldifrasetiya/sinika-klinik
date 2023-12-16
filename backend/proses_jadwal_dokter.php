<?php

include "config/db-klinik.php";

// Mendapatkan ID pasien terbesar dari database
$query = mysqli_query($db_connect, "SELECT max(id_dokter) as idTerbesar FROM jadwal_dokter");
$data = mysqli_fetch_array($query);

// Mengenerate ID pasien baru
$urutan = (int) substr($data['idTerbesar'], 3, 4) + 1;
$id_dokter_baru = "DKT" . sprintf("%04d", $urutan);

// Menampilkan ID pasien baru (opsional)
echo $id_dokter_baru;

$QueryGetListDokter = mysqli_query($db_connect, "SELECT * FROM jadwal_dokter");

// tambah jadwal dokter php
if (isset($_POST["Tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $hp = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);
    $jp = mysqli_real_escape_string($db_connect, $_POST['jamPraktek']);

    $QueryAddDokter = "INSERT INTO jadwal_dokter(id_dokter, nama_dokter, spesialis, no_hp, hari_praktek, jam_praktek) VALUES('" . $id_dokter_baru . "', '" . $nama_dokter . "','" . $spesialis . "','" . $no_tlp . "','" . $hp . "','" . $jp . "')";

    $ResultQueryAddDokter = mysqli_query($db_connect, $QueryAddDokter);

    header("Location: ../pages/content/admin/m_dokter_umum.php");
}

// edit jadwal dokter
if (isset($_POST["UbahJadwal"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $hp = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);
    $jp = mysqli_real_escape_string($db_connect, $_POST['jamPraktek']);

    $queryUpdateDokter = "UPDATE jadwal_dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', no_hp='$no_tlp', hari_praktek='$hp', jam_praktek='$jp' WHERE id_dokter='$id_dokter'";

    $resultUpdateDokter = mysqli_query($db_connect, $queryUpdateDokter);

    // var_dump($id_dokter);
    // die;

    header("Location: ../pages/content/admin/m_dokter_umum.php");
}

// hapus jadwal dokter
if (isset($_GET['id_dokter'])) {
    mysqli_query($db_connect, "DELETE FROM jadwal_dokter WHERE id_dokter='$_GET[id_dokter]'");

    header("Location: ../pages/content/admin/m_dokter_umum.php");
    die();
}


?>