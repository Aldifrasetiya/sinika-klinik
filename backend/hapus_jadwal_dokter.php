<?php

require 'config/db-klinik.php';

if(isset($_GET['id_dokter'])) {
    mysqli_query($db_connect, "DELETE FROM jadwal_dokter WHERE id_dokter='$_GET[id_dokter]'");

    header("Location: ./../pages/m_dokter_umum.php");
}

?>