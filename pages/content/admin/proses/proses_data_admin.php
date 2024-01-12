<?php

include "config/db-klinik.php";

// // Mendapatkan ID pasien terbesar dari database
// $query = mysqli_query($db_connect, "SELECT max(id_dokter) as idTerbesar FROM jadwal_dokter");
// $data = mysqli_fetch_array($query);

// // Mengenerate ID pasien baru
// $urutan = (int) substr($data['idTerbesar'], 3, 4) + 1;
// $id_dokter_baru = "DKT" . sprintf("%04d", $urutan);

// // Menampilkan ID pasien baru (opsional)
// echo $id_dokter_baru;

$QueryGetListAdmin = mysqli_query($db_connect, "SELECT * FROM users");

// tambah jadwal dokter php
if (isset($_POST["tambahAdmin"])) {
    global $db_connect;
    // Ambil data dari formulir
    // $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $nama_users = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);
    // $idAdmin = mysqli_real_escape_string($db_connect, $_POST['idAdmin']);

    $password = password_hash($password, PASSWORD_BCRYPT);
    $QueryAddAdmin = "INSERT INTO users(username, email, password) VALUES('" . $nama_users . "','" . $email . "','" . $password . "')";

    $ResultQueryAddAdmin = mysqli_query($db_connect, $QueryAddAdmin);

    header("Location: ../pages/content/owner/m_data_user.php");
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