<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_klinik';

$db_connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()) {
    echo "gagal terkoneksi ke mysql" . mysqli_connect();
}

?>