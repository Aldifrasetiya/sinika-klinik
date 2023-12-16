<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_pasien.php");
require_once("{$base_dir}backend{$ds}proses_antrian_pasien.php");
?>


<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Informasi Antrian</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="d_pasien.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="p_pendaftaran">Pendaftaran</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="p_halaman_antrian.php">Informasi Antrian</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <div class="mt-5 col-md-12">
                    <?php
                    require_once("../../../backend/config/db-klinik.php");

                    if (isset($_GET['nomor_antrian']) && isset($_GET['id_pasien'])) {
                        $nomor_antrian = $_GET['nomor_antrian'];

                        // Ambil informasi pasien dan dokter
                        $sqlInfoPasienDokter = "SELECT antrian.no_antrian, antrian.atas_nama_pasien, jadwal_dokter.nama_dokter, jadwal_dokter.spesialis
                        FROM antrian
                        JOIN jadwal_dokter ON antrian.id_dokter = jadwal_dokter.id_dokter
                        WHERE antrian.no_antrian = $nomor_antrian";
                        $result = $db_connect->query($sqlInfoPasienDokter);


                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $nomor_antrian = $row['no_antrian'];
                            $pasien = $row['atas_nama_pasien'];
                            $nama_dokter = $row['nama_dokter'];
                            $spesialis = $row['spesialis'];

                            echo "Nomor Antrian: $nomor_antrian<br>";
                            echo "Nama Pasien: $pasien<br>";
                            echo "Nama Dokter: $nama_dokter<br>";
                            echo "Spesialis: $spesialis";
                        } else {
                            echo "Tidak ada informasi antrian yang valid.";
                        }
                    }
                    ?>
                    <!-- <?php
                    var_dump($nomor_antrian, $pasien, $nama_dokter, $spesialis);
                    ?> -->
                </div>
            </div>
        </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>