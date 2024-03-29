<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_pasien.php");

?>

<body>
    <!-- ======= Pendaftaran Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="zoom-in">
            <header class="section-header mt-5"> <!-- Added margin-bottom (mb-4) to the header -->
                <p>Pendaftaran </p>
            </header>

            <div class="row justify-content-center">
                <?php
                require('../../../backend/config/db-klinik.php');

                $databaseDokter = "SELECT jadwal_dokter.*, dokter.nama_dokter, dokter.spesialisasi
                FROM jadwal_dokter
                INNER JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter";
                $result = $db_connect->query($databaseDokter);
                ?>
                <form action="proses/proses_antrian_pasien.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="hari" value="<?= date('N'); ?>">
                                <label for="nama_pasien" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_pasien" id="nama_pasien"
                                    aria-describedby="nama">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dokter" class="form-label">Pilih Dokter</label>
                                <select name="id_dokter" id="dokter" class="form-select">
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='{$row['id_dokter']}'>{$row['nama_dokter']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-action py-3">
                            <button type="submit" name="DaftarAntrian" class="btn btn-success">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- End Pendaftaran Section -->

</body>