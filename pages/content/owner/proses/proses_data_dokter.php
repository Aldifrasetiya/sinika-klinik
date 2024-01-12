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

// $QueryGetListDokter = mysqli_query($db_connect, "SELECT * FROM dokter");

// tambah jadwal dokter php
if (isset($_POST["tambahDokter"])) {
    global $connect;
    // Ambil data dari formulir
    // $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $jdwPraktek = mysqli_real_escape_string($db_connect, $_POST['jdwPraktek']);

    $QueryAddDokter = "INSERT INTO dokter(nama_dokter, spesialisasi, notlp_dokter, jadwal_praktek) VALUES('" . $nama_dokter . "','" . $spesialis . "','" . $no_tlp . "', '" . $jdwPraktek . "')";

    $ResultQueryAddDokter = mysqli_query($db_connect, $QueryAddDokter);

    header("Location: ../m_data_dokter.php");
}

// edit jadwal dokter
if (isset($_POST["ubahDokter"])) {
    global $db_connect;
    // Ambil data dari formulir
    $id_dokter = mysqli_real_escape_string($db_connect, $_POST['id_dokter']);
    $nama_dokter = mysqli_real_escape_string($db_connect, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($db_connect, $_POST['spesialis']);
    $no_tlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $jdwPraktek = mysqli_real_escape_string($db_connect, $_POST['hariPraktek']);

    $queryUpdateDokter = "UPDATE dokter SET nama_dokter='$nama_dokter', spesialisasi='$spesialis', notlp_dokter='$no_tlp', jadwal_praktek='$jdwPraktek' WHERE id_dokter='$id_dokter'";

    $resultUpdateDokter = mysqli_query($db_connect, $queryUpdateDokter);

    // var_dump($id_dokter);
    // die;

    header("Location: ../m_data_dokter.php");
    exit();
}

// hapus jadwal dokter
if (isset($_GET['id_dokter'])) {
    mysqli_query($db_connect, "DELETE FROM dokter WHERE id_dokter='$_GET[id_dokter]'");

    header("Location: ../m_data_dokter.php");
    die();
}


?>