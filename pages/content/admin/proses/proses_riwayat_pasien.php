<?php

include "../../../../backend/config/db-klinik.php";

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

    header("Location: ../m_riwayat_pasien.php");
}
if (isset($_POST["ubah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_riwayat = mysqli_real_escape_string($db_connect, $_POST['id_riwayat']);
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $tgl = mysqli_real_escape_string($db_connect, $_POST['tgl']);
    $jpelayanan = mysqli_real_escape_string($db_connect, $_POST['jp']);
    $ket = mysqli_real_escape_string($db_connect, $_POST['ket']);

    $QueryUpdate = "UPDATE riwayat_pasien SET id_pasien='$id_pasien', tanggal='$tgl', jenis_pelayanan='$jpelayanan', keterangan='$ket' WHERE id_riwayat='$id_riwayat'";

    $ResultQueryUpdate = mysqli_query($db_connect, $QueryUpdate);

    header("Location: ../m_riwayat_pasien.php");
}


// hapus riwayat pasien
if (isset($_GET['id_riwayat'])) {
    mysqli_query($db_connect, "DELETE FROM riwayat_pasien WHERE id_riwayat='$_GET[id_riwayat]'");

    header("Location: ../pages/content/admin/m_riwayat_pasien.php");
    die();
}


?>