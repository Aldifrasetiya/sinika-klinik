<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_pasien.php");
// require_once("{$base_dir}backend{$ds}proses_antrian_pasien.php");
?>


<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Pendaftaran</h4>
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
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <div class="mt-5 col-md-12">
                    <h2>Informasi Antrian</h2>
                    <?php
                    if (isset($_GET['nomor_antrian'])) {
                        $nomor_antrian = $_GET['nomor_antrian'];

                        // Anda bisa mengambil informasi lainnya dari database atau variabel sesuai kebutuhan
                        $id_antrian = $_POST['ID_Antrian'];
                        $id_pasien = $_POST['ID_Pasien'];
                        // $nomor_asuransi = $_POST['noAsuransi'];

                        echo "ID Antrian: $id_pasien<br>";
                        echo "ID Pasien: $id_pasien<br>";
                        // echo "Jenis Asuransi: $jenis_asuransi<br>";
                        // echo "Nomor BPJS: $nomor_asuransi<br>";
                        // echo "Dokter: $nama_dokter<br>";
                    } else {
                        echo "Tidak ada informasi antrian yang valid.";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>