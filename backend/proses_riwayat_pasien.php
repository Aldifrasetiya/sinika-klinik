<?php

include "config/db-klinik.php";

// tambah riwayat pasien
if (isset($_POST["tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $tgl = mysqli_real_escape_string($db_connect, $_POST['tgl']);
    $jpelayanan = mysqli_real_escape_string($db_connect, $_POST['jPelayanan']);
    $ket = mysqli_real_escape_string($db_connect, $_POST['ket']);

    $QueryAdd = "INSERT INTO riwayat_pasien(id_pasien, tanggal, jenis_pelayanan, keterangan) VALUES('" . $id_pasien . "','" . $tgl . "','" . $jpelayanan . "','" . $ket . "')";

    $ResultQueryAdd = mysqli_query($db_connect, $QueryAdd);

    header("Location: ../pages/content/admin/m_riwayat_pasien.php");
}

// // edit jadwal dokter
// if (isset($_POST["ubah"])) {
//     global $db_connect;
//     // Ambil data dari formulir
//     $id_rekam_medis = mysqli_real_escape_string($db_connect, $_POST['id_rekam_medis']);
//     $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
//     $rp = mysqli_real_escape_string($db_connect, $_POST['rp']);
//     $alergi = mysqli_real_escape_string($db_connect, $_POST['alergi']);
//     $ct = mysqli_real_escape_string($db_connect, $_POST['ct']);

//     $queryUpdate = "UPDATE rekam_medis SET id_pasien='$id_pasien', riwayat_penyakit='$rp', alergi='$alergi', catatan_lain='$ct' WHERE id_rekam_medis='$id_rekam_medis'";

//     $resultUpdate = mysqli_query($db_connect, $queryUpdate);

//     // var_dump($id_dokter);
//     // die;

//     header("Location: ../pages/content/admin/m_rekam_medis.php");
// }

// hapus riwayat pasien
if (isset($_GET['id_riwayat'])) {
    mysqli_query($db_connect, "DELETE FROM riwayat_pasien WHERE id_riwayat='$_GET[id_riwayat]'");

    header("Location: ../pages/content/admin/m_riwayat_pasien.php");
    die();
}


?>