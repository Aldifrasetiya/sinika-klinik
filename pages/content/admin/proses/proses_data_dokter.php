<?php

include "../../../../backend/config/db-klinik.php";

// hapus dokter
if (isset($_GET['id_dokter'])) {
    $id_dokter_to_delete = $_GET['id_dokter'];

    // Periksa apakah ada data di tabel resep terkait dengan pasien yang akan dihapus
    $query_check_resep = "SELECT * FROM antrian WHERE id_dokter = '$id_dokter_to_delete'";
    $result_check_resep = mysqli_query($db_connect, $query_check_resep);

    if (!$result_check_resep) {
        // Tampilkan Sweet Alert error jika query check resep gagal
        echo json_encode(array('status' => 'error', 'message' => 'Error saat memeriksa data terkait di tabel antrian & resep.'));
    } else {
        if (mysqli_num_rows($result_check_resep) > 0) {
            // Jika ada data terkait, tampilkan Sweet Alert error
            echo json_encode(array('status' => 'error', 'message' => 'Tidak dapat menghapus pasien karena masih ada data terkait di tabel antrian & resep.'));
        } else {
            // Jika tidak ada data terkait, hapus data pasien
            mysqli_query($db_connect, "DELETE FROM dokter WHERE id_dokter = '$id_dokter_to_delete'");

            // Tampilkan Sweet Alert sukses
            echo json_encode(array('status' => 'success', 'message' => 'Data Obat berhasil dihapus.'));
        }
    }
}

// tambah dokter php
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

// edit dokter
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

// // hapus dokter
// if (isset($_GET['id_dokter'])) {
//     mysqli_query($db_connect, "DELETE FROM dokter WHERE id_dokter='$_GET[id_dokter]'");

//     header("Location: ../m_data_dokter.php");
//     die();
// }


?>