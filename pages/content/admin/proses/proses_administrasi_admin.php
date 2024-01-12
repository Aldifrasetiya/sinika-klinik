<?php

include "config/db-klinik.php";

// tambah administrasi admin
if (isset($_POST["tambahAdministrasiAdmin"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_users = mysqli_real_escape_string($db_connect)
    // $nama_admin = mysqli_real_escape_string($db_connect, $_POST['namaAdmin']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);

    $QueryAdmAdmin = "INSERT INTO administrasi_admin(nama_admin, jk_admin, alamat_admin, notlp_admin) VALUES('" . $nama_admin . "','" . $jk . "','" . $alamat . "','" . $notlp . "')";

    $ResultQueryAdmAdmin = mysqli_query($db_connect, $QueryAdmAdmin);

    header("Location: ../pages/content/admin/m_administrasi_admin.php");
}

// edit jadwal dokter
if (isset($_POST["ubahDokter"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $jdwPraktek = mysqli_real_escape_string($db_connect, $_POST['jdwPraktek']);

    $queryUpdateDokter = "UPDATE dokter SET nama_dokter='$nama_dokter', spesialisasi='$spesialis', notlp_dokter='$no_tlp', jadwal_praktek='$jdwPraktek' WHERE id_dokter='$id_dokter'";

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