<?php

include "config/db-klinik.php";

$QueryDataObat = mysqli_query($db_connect, "SELECT * FROM resep");

// tambah data obat php
if (isset($_POST["TambahResep"])) {
    global $db_connect;
    // Ambil data dari formulir
    // $id_resep = mysqli_real_escape_string($db_connect, $_POST['id_resep']);
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $id_obat = mysqli_real_escape_string($db_connect, $_POST['id_obat']);
    $tgl_resep = mysqli_real_escape_string($db_connect, $_POST['tglResep']);
    // $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jmlh_obat = mysqli_real_escape_string($db_connect, $_POST['jmlhObat']);

    $QueryAddResep = "INSERT INTO resep(id_pasien, id_dokter, id_obat, tgl_resep, jumlah_obat) VALUES('" . $id_pasien . "','" . $id_dokter . "','" . $id_obat . "','" . $tgl_resep . "', '" . $jmlh_obat . "')";

    $ResultQueryResep = mysqli_query($db_connect, $QueryAddResep);

    header("Location: ../pages/content/admin/m_data_resep.php");
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

    header("Location: ../pages/content/admin/m_data_obat.php");
}

// hapus data obat
if (isset($_GET['id_obat'])) {
    mysqli_query($db_connect, "DELETE FROM obat WHERE id_obat='$_GET[id_obat]'");

    header("Location: ../pages/content/admin/m_data_obat.php");
    die();
}


?>