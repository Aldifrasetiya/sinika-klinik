<?php

include "../../../../backend/config/db-klinik.php";

// hapus dokter
if (isset($_GET['id_obat'])) {
    $id_obat_to_delete = $_GET['id_obat'];

    // Periksa apakah ada data di tabel resep terkait dengan obat yang akan dihapus
    $query_check_resep = "SELECT * FROM resep WHERE id_obat = '$id_obat_to_delete'";
    $result_check_resep = mysqli_query($db_connect, $query_check_resep);

    if (!$result_check_resep) {
        // Tampilkan Sweet Alert error jika query check resep gagal
        echo json_encode(array('status' => 'error', 'message' => 'Error saat memeriksa data terkait di resep.'));
    } else {
        if (mysqli_num_rows($result_check_resep) > 0) {
            // Jika ada data terkait, tampilkan Sweet Alert error
            echo json_encode(array('status' => 'error', 'message' => 'Tidak dapat menghapus pasien karena masih ada data terkait di resep.'));
        } else {
            // Jika tidak ada data terkait, hapus data pasien
            mysqli_query($db_connect, "DELETE FROM obat WHERE id_obat = '$id_obat_to_delete'");

            // Tampilkan Sweet Alert sukses
            echo json_encode(array('status' => 'success', 'message' => 'Data Obat berhasil dihapus.'));
        }
    }
}

// tambah data obat php
if (isset($_POST["Tambah"])) {
    global $db_connect;
    // Ambil data dari formulir
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['namaObat']);
    $jenis = mysqli_real_escape_string($db_connect, $_POST['jenis']);
    $harga = mysqli_real_escape_string($db_connect, $_POST['harga']);
    $stok = mysqli_real_escape_string($db_connect, $_POST['stok']);

    $QueryAddObat = "INSERT INTO obat(nama_obat, jenis_obat, harga, stok) VALUES('" . $nama_obat . "','" . $jenis . "','" . $harga . "','" . $stok . "')";

    $ResultQueryObat = mysqli_query($db_connect, $QueryAddObat);

    header("Location: ../m_data_obat.php");
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

    header("Location: ../m_data_obat.php");
}

// // hapus data obat
// if (isset($_GET['id_obat'])) {
//     mysqli_query($db_connect, "DELETE FROM obat WHERE id_obat='$_GET[id_obat]'");

//     header("Location: ../m_data_obat.php");
//     die();
// }


?>