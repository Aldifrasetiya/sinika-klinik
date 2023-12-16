<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_pasien.php");
require_once("{$base_dir}backend{$ds}proses_antrian_pasien.php");

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
                <?php
                require('../../../backend/config/db-klinik.php');

                $databaseDokter = "SELECT id_dokter, nama_dokter FROM jadwal_dokter";
                $result = $db_connect->query($databaseDokter);
                ?>
                <form action="../../../backend/proses_antrian_pasien.php" method="POST">
                    <div class=" row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="hari" value="<?= date('N'); ?>">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        aria-describedby="nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat" class="form-label">Dokter</label>
                                    <select name="id_dokter" id="" class="form-control">
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='{$row['id_dokter']}'>{$row['nama_dokter']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            <div class="card-action">
                                <button type="submit" name="DaftarAntrian" class="btn btn-success">Daftar</button>
                            </div>
                        </div>
                        <script>
                            document.getElementById("asuransi").addEventListener("change", function () {
                                const selectedOption = this.value;
                                const noBpjsInput = document.getElementById("noBpjsInput");

                                if (selectedOption === "BPJS" || selectedOption === "Asuransi lainnya") {
                                    noBpjsInput.style.display = "block";
                                } else {
                                    noBpjsInput.style.display = "none";
                                }
                            });
                        </script>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>