<?php
include "config/db-klinik.php";

// tambah data pasien
if (isset($_POST['TambahPasien'])) {
    // Melakukan validasi data form untuk mencegah SQL injection
    // $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $nama_pasien = mysqli_real_escape_string($db_connect, $_POST['namaPasien']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $ttl = mysqli_real_escape_string($db_connect, $_POST['ttl']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $penyakit = mysqli_real_escape_string($db_connect, $_POST['penyakit']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $asuransi = mysqli_real_escape_string($db_connect, $_POST['asuransi']);
    $noAsuransi = mysqli_real_escape_string($db_connect, $_POST['noAsuransi']);


    // Query untuk menambahkan data pasien baru
    $QueryAddPasien = "INSERT INTO pasien(nama_pasien, alamat, tanggal_lahir, jk, penyakit, no_telepon, jenis_asuransi, no_asuransi) 
                       VALUES ('$nama_pasien', '$alamat', '$ttl', '$jk', '$penyakit', '$notlp', '$asuransi', '$noAsuransi')";

    // Menjalankan query
    $resultQueryAddPasien = mysqli_query($db_connect, $QueryAddPasien);

    // Memeriksa apakah query berhasil dijalankan
    if ($resultQueryAddPasien) {
        // Mengarahkan kembali ke halaman data pasien setelah menambahkan data
        header("Location: ../pages/content/admin/m_data_pasien.php");
    } else {
        // Menampilkan pesan kesalahan jika query tidak berhasil
        echo "Error: " . mysqli_error($db_connect);
    }

    // Menutup koneksi database setelah digunakan
    $db->closeConnection();
    
}


// edit data pasien
if (isset($_POST["UbahPasien"])) {
    global $db_connect;

    // Ambil data dari formulir
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['id_pasien']);
    $nama_pasien = mysqli_real_escape_string($db_connect, $_POST['namaPasien']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $ttl = mysqli_real_escape_string($db_connect, $_POST['ttl']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $penyakit = mysqli_real_escape_string($db_connect, $_POST['penyakit']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $asuransi = mysqli_real_escape_string($db_connect, $_POST['asuransi']);

    $queryUpdatePasien = "UPDATE pasien SET id_pasien = '$id_pasien' nama_pasien = '$nama_pasien', alamat = '$alamat', tanggal_lahir='$ttl', jk='$jk', penyakit='$penyakit', no_Telepon='$notlp', jenis_asuransi='$asuransi' WHERE id_pasien='$id_pasien'";

    $resultUpdatePasien = mysqli_query($db_connect, $queryUpdatePasien);

    header("Location: ../pages/content/admin/m_data_pasien.php");

}

// hapus data pasien
if (isset($_GET['id_pasien'])) {
    mysqli_query($db_connect, "DELETE FROM pasien WHERE id_pasien='$_GET[id_pasien]'");

    header("Location: ../pages/content/admin/m_data_pasien.php");
    die();
}



?>