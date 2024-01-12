<?php

include "../../../../backend/config/db-klinik.php";

$QueryDataObat = mysqli_query($db_connect, "SELECT * FROM obat");

// tambah data obat php
if (isset($_POST["Tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jenis = mysqli_real_escape_string($db_connect, $_POST['jenis']);
    $harga = mysqli_real_escape_string($db_connect, $_POST['harga']);
    $stok = mysqli_real_escape_string($db_connect, $_POST['stok']);

    $QueryAddObat = "INSERT INTO obat(nama_obat, jenis_obat, harga, stok) VALUES('" . $nama_obat . "','" . $jenis . "','" . $harga . "','" . $stok . "')";

    $ResultQueryObat = mysqli_query($db_connect, $QueryAddObat);

    header("Location: ../m_data_obat.php");
}

// ubah data obat php
if (isset($_POST["ubahObat"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_obat = mysqli_real_escape_string($db_connect, $_POST['id_obat']);
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jenis = mysqli_real_escape_string($db_connect, $_POST['jenis']);
    $harga = mysqli_real_escape_string($db_connect, $_POST['harga']);
    $stok = mysqli_real_escape_string($db_connect, $_POST['stok']);

    $QueryUpdateObat = "UPDATE obat SET nama_obat='$nama_obat', jenis_obat='$jenis', harga='$harga', stok='$stok' WHERE id_obat = '$id_obat'";

    $ResultUpdateteObat = mysqli_query($db_connect, $QueryUpdateObat);

    header("Location: ../m_data_obat.php");
}

// hapus data obat
if (isset($_GET['id_obat'])) {
    mysqli_query($db_connect, "DELETE FROM obat WHERE id_obat='$_GET[id_obat]'");

    header("Location: ../m_data_obat.php");
    die();
}


?>