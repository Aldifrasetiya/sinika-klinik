<?php

include "../../../../backend/config/db-klinik.php";

// tambah data resep php
if (isset($_POST["TambahResep"])) {
    global $db_connect;
    // Ambil data dari formulir
    // $id_resep = mysqli_real_escape_string($db_connect, $_POST['id_resep']);
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $id_obat = mysqli_real_escape_string($db_connect, $_POST['id_obat']);
    $tgl_resep = mysqli_real_escape_string($db_connect, $_POST['tglResep']);
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jmlh_obat = mysqli_real_escape_string($db_connect, $_POST['jmlhObat']);

    $QueryAddResep = "INSERT INTO resep(id_pasien, id_dokter, id_obat, tgl_resep, nama_obat, jumlah_obat) VALUES('" . $id_pasien . "','" . $id_dokter . "','" . $id_obat . "','" . $tgl_resep . "','" . $nama_obat . "', '" . $jmlh_obat . "')";

    $ResultQueryResep = mysqli_query($db_connect, $QueryAddResep);

    header("Location: ../m_data_resep.php");
}

// ubah data resep
if (isset($_POST["ubahResep"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_resep = mysqli_real_escape_string($db_connect, $_POST['id_resep']);
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $id_obat = mysqli_real_escape_string($db_connect, $_POST['id_obat']);
    $tgl_resep = mysqli_real_escape_string($db_connect, $_POST['tglResep']);
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jmlh_obat = mysqli_real_escape_string($db_connect, $_POST['jmlhObat']);

    $QueryUpdateResep = "UPDATE resep SET id_pasien='$id_pasien', id_dokter='$id_dokter', id_obat='$id_obat', tgl_resep='$tgl_resep', nama_obat='$nama_obat', jumlah_obat='$jmlh_obat' WHERE id_resep = '$id_resep'";

    $ResultUpdateResep = mysqli_query($db_connect, $QueryUpdateResep);

    header("Location: ../m_data_resep.php");
}

// hapus data obat
if (isset($_GET['id_resep'])) {
    mysqli_query($db_connect, "DELETE FROM resep WHERE id_resep='$_GET[id_resep]'");

    header("Location: ../m_data_resep.php");
    die();
}


?>