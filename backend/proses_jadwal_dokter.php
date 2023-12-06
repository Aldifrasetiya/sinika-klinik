<?php

include "config/db-klinik.php";

$QueryGetListDokter = mysqli_query($db_connect, "SELECT * FROM jadwal_dokter");

// tambah_jadwal_dokter.php
if(isset($_POST["Tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $hp = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);
    $jp = mysqli_real_escape_string($db_connect, $_POST['jamPraktek']);

    $QueryAddDokter = "INSERT INTO jadwal_dokter(nama_dokter, spesialis, no_hp, hari_praktek, jam_praktek) VALUES('".$nama_dokter."','".$spesialis."','".$no_tlp."','".$hp."','".$jp."')";

    $ResultQueryAddDokter = mysqli_query($db_connect, $QueryAddDokter);

    header("Location: ./../pages/m_dokter_umum.php");
}

// edit_jadwal_dokter.php
if(isset($_POST["UbahJadwal"])) {
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

    header("Location: ./../pages/m_dokter_umum.php");
}


?>