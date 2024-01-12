<?php

include "../../../../backend/config/db-klinik.php";

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
    $nama = mysqli_real_escape_string($db_connect, $_POST['nama']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $username = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);

    $password = password_hash($password, PASSWORD_BCRYPT);
    $QueryAddAdmin = "INSERT INTO users(nama_users, jk_users, alamat_users, notlp_users, username, email, password) VALUES('" . $nama . "','" . $jk . "','" . $alamat . "','" . $notlp . "','" . $username . "','" . $email . "','" . $password . "')";

    $ResultQueryAddAdmin = mysqli_query($db_connect, $QueryAddAdmin);

    header("Location: ../m_data_user.php");
}

// edit jadwal dokter
if (isset($_POST["UbahAdmin"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_users = mysqli_real_escape_string($db_connect, $_POST['id_users']);
    $nama = mysqli_real_escape_string($db_connect, $_POST['nama']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $username = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    // $password = mysqli_real_escape_string($db_connect, $_POST['password']);

    $queryUpdateAdmin = "UPDATE users SET nama_users='$nama', jk_users='$jk', alamat_users='$alamat', notlp_users='$notlp', username='$username', email='$email' WHERE id_users='$id_users'";

    $resultUpdateAdmin = mysqli_query($db_connect, $queryUpdateAdmin);

    // var_dump($id_dokter);
    // die;

    header("Location: ../m_data_user.php");
}

// hapus jadwal dokter
if (isset($_GET['id_users'])) {
    mysqli_query($db_connect, "DELETE FROM users WHERE id_users='$_GET[id_users]'");

    header("Location: ../m_data_user.php");
    die();
}


?>