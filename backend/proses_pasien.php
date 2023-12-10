<?php
include "config/db-klinik.php";

// Mendapatkan ID pasien terbesar dari database
$query = mysqli_query($db_connect, "SELECT max(ID_Pasien) as idTerbesar FROM pasien");
$data = mysqli_fetch_array($query);

// Mengenerate ID pasien baru
$urutan = (int) substr($data['idTerbesar'], 3, 3) + 1;
$id_pasien_baru = "PSN" . sprintf("%03d", $urutan);

// Menampilkan ID pasien baru (opsional)
echo $id_pasien_baru;


$QueryPasien = mysqli_query($db_connect, "SELECT * FROM pasien");

// tambah data pasien
if (isset($_POST['TambahPasien'])) {
    // Melakukan validasi data form untuk mencegah SQL injection
    $nama_pasien = mysqli_real_escape_string($db_connect, $_POST['namaPasien']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $ttl = mysqli_real_escape_string($db_connect, $_POST['ttl']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $asuransi = mysqli_real_escape_string($db_connect, $_POST['asuransi']);

    // Query untuk menambahkan data pasien baru
    $QueryAddPasien = "INSERT INTO pasien(ID_Pasien, Nama_Pasien, Alamat, tanggal_lahir, jk, Nomor_Telepon, Jenis_Asuransi) 
                       VALUES ('$id_pasien_baru', '$nama_pasien', '$alamat', '$ttl', '$jk', '$notlp', '$asuransi')";

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
}

// edit data pasien
if (isset($_POST["UbahPasien"])) {
    global $db_connect;

    // Ambil data dari formulir
    $id_pasien = mysqli_real_escape_string($db_connect, $_POST['ID_Pasien']);
    $nama_pasien = mysqli_real_escape_string($db_connect, $_POST['namaPasien']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $ttl = mysqli_real_escape_string($db_connect, $_POST['ttl']);
    $jk = mysqli_real_escape_string($db_connect, $_POST['jk']);
    $notlp = mysqli_real_escape_string($db_connect, $_POST['notlp']);
    $asuransi = mysqli_real_escape_string($db_connect, $_POST['asuransi']);

    $queryUpdatePasien = "UPDATE pasien SET Nama_Pasien = '$nama_pasien', Alamat = '$alamat', tanggal_lahir='$ttl', jk='$jk', Nomor_Telepon='$notlp', Jenis_Asuransi='$asuransi' WHERE ID_Pasien='$id_pasien'";

    $resultUpdatePasien = mysqli_query($db_connect, $queryUpdatePasien);

    header("Location: ../pages/content/admin/m_data_pasien.php");

}

// hapus jadwal dokter
if (isset($_GET['id_pasien'])) {
    mysqli_query($db_connect, "DELETE FROM pasien WHERE id_pasien='$_GET[id_pasien]'");

    header("Location: .../pages/content/admin/m_data_pasien.php");
}



?>