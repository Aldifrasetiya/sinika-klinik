<?php

include "config/db-klinik.php";

// tambah rekam medis
if (isset($_POST["tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $rp = mysqli_real_escape_string($db_connect, $_POST['rp']);
    $alergi = mysqli_real_escape_string($db_connect, $_POST['alergi']);
    $ct = mysqli_real_escape_string($db_connect, $_POST['ct']);
    // $idAdmin = mysqli_real_escape_string($db_connect, $_POST['idAdmin']);

    $QueryAdd = "INSERT INTO rekam_medis(id_pasien, riwayat_penyakit, alergi, catatan_lain) VALUES('" . $id_pasien . "','" . $rp . "','" . $alergi . "','" . $ct . "')";

    $ResultQueryAdd = mysqli_query($db_connect, $QueryAdd);

    header("Location: ../pages/content/admin/m_rekam_medis.php");
}

// edit rekam medis
if (isset($_POST["ubah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_rekam_medis = mysqli_real_escape_string($db_connect, $_POST['id_rekam_medis']);
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $rp = mysqli_real_escape_string($db_connect, $_POST['rp']);
    $alergi = mysqli_real_escape_string($db_connect, $_POST['alergi']);
    $ct = mysqli_real_escape_string($db_connect, $_POST['ct']);

    $queryUpdate = "UPDATE rekam_medis SET id_pasien='$id_pasien', riwayat_penyakit='$rp', alergi='$alergi', catatan_lain='$ct' WHERE id_rekam_medis='$id_rekam_medis'";

    $resultUpdate = mysqli_query($db_connect, $queryUpdate);


    header("Location: ../pages/content/admin/m_rekam_medis.php");
}

// hapus rekam medis
if (isset($_GET['id_rekam_medis'])) {
    mysqli_query($db_connect, "DELETE FROM rekam_medis WHERE id_rekam_medis='$_GET[id_rekam_medis]'");

    header("Location: ../pages/content/admin/m_rekam_medis.php");
    die();
}


?>