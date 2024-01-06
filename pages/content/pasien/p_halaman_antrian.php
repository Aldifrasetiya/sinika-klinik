<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_pasien.php");
require_once("{$base_dir}backend{$ds}proses_antrian_pasien.php");
?>


<body>

    <!-- ======= Halaman Antrian Section ======= -->
    <section id="antrian" class="contact">
        <div class="container" data-aos="zoom-in">
            <header class="section-header mt-5">
                <p>Informasi Antrian</p>
            </header>
            <div class="col-md-12">
                <?php
                require_once("../../../backend/config/db-klinik.php");

                if (isset($_GET['nomor_antrian']) && isset($_GET['id_pasien'])) {
                    $nomor_antrian = $_GET['nomor_antrian'];

                    // Ambil informasi pasien dan dokter
                    $sqlInfoPasienDokter = "SELECT antrian.no_antrian, antrian.atas_nama_pasien, antrian.atas_nama_pasien, antrian.tanggal_antrian, antrian.status_antrian, dokter.nama_dokter, dokter.spesialisasi
                    FROM antrian
                    JOIN jadwal_dokter ON antrian.id_dokter = jadwal_dokter.id_dokter
                    JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter
                    WHERE antrian.no_antrian = ?";

                    $stmt = $db_connect->prepare($sqlInfoPasienDokter);
                    $stmt->bind_param("i", $nomor_antrian);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nomor_antrian = $row['no_antrian'];
                        $atas_nama_pasien = $row['atas_nama_pasien'];
                        $nama_dokter = $row['nama_dokter'];
                        $spesialis = $row['spesialisasi'];
                        $tglAntrian = $row['tanggal_antrian'];
                        $stsAntrian = $row['status_antrian'];

                        echo "Nomor Antrian: $nomor_antrian<br>";
                        echo "Atas Nama Pasien: $atas_nama_pasien<br>";
                        echo "Nama Dokter: $nama_dokter<br>";
                        echo "Spesialis: $spesialis<br>";
                        echo "Tanggal Antrian: $tglAntrian<br>";
                        echo "Status Antrian: $stsAntrian";
                    } else {
                        echo "Tidak ada informasi antrian yang valid.";
                    }

                    $stmt->close();

                }
                ?>
                <!-- <?php
                var_dump($nomor_antrian, $pasien, $nama_dokter, $spesialis);
                ?> -->
            </div>
            <a href="../../../d_pasien.php">
                <button type="button" class="btn btn-primary my-3">Kembali ke home</button>
            </a>
        </div>

    </section>
    <!-- ======= End Halaman Antrian Section ======= -->
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>