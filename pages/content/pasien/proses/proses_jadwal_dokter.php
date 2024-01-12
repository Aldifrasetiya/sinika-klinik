<?php

include "../../../../backend/config/db-klinik.php";


// tambah jadwal dokter php
if (isset($_POST["tambahJadwalDokter"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    // $namaDokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    // $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $hariPraktek = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);
    $jamMulai = mysqli_real_escape_string($db_connect, $_POST['jamMulai']);
    $jamSelesai = mysqli_real_escape_string($db_connect, $_POST['jamSelesai']);

    $QueryAddJadwalDokter = "INSERT INTO jadwal_dokter(id_dokter, hari_praktek, jam_mulai_praktek, jam_selesai_praktek) VALUES('" . $id_dokter . "', '" . $hariPraktek . "','" . $jamMulai . "','" . $jamSelesai . "' )";

    $ResultQueryJadwalDokter = mysqli_query($db_connect, $QueryAddJadwalDokter);

    header("Location: ../m_jadwal_dokter_umum.php");
}


// edit jadwal dokter
if (isset($_POST["ubahJadwalDokter"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_jadwal_dokter = mysqli_real_escape_string($db_connect, $_POST['id_jadwal_dokter']);
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $hp = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);
    $mp = mysqli_real_escape_string($db_connect, $_POST['mulaiPraktek']);
    $sp = mysqli_real_escape_string($db_connect, $_POST['selesaiPraktek']);


    $queryUpdateJadwalDokter = "UPDATE jadwal_dokter SET hari_praktek='$hp', jam_mulai_praktek='$mp', jam_selesai_praktek='$sp'
                            WHERE id_jadwal_dokter='$id_jadwal_dokter'";


    $resultUpdateDokter = mysqli_query($db_connect, $queryUpdateJadwalDokter);

    // var_dump($id_dokter);
    // die;

    header("Location: ../m_jadwal_dokter_umum.php");
}

// hapus jadwal dokter
if (isset($_GET['id_jadwal_dokter'])) {
    mysqli_query($db_connect, "DELETE FROM jadwal_dokter WHERE id_jadwal_dokter='$_GET[id_jadwal_dokter]'");

    header("Location: ../m_jadwal_dokter_umum.php");
    die();
}


?>