<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_jadwal_dokter.php");

?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Tambah Jadwal Dokter Umum</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="dashboard.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_jadwal_dokter.php">Jadwal Dokter Umum</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_jadwal_dokter.php">Tambah Jadwal Dokter Umum</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <form action="../../../backend/proses_jadwal_dokter.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    // require '../../../backend/config/db-klinik.php';
                                    
                                    $idDokterQuery = mysqli_query($db_connect, "SELECT * FROM dokter");
                                    $idDokterOptions = array();

                                    while ($idDokterRow = mysqli_fetch_assoc($idDokterQuery)) {
                                        $idDokterOptions[] = $idDokterRow['id_dokter'];
                                    }

                                    ?>
                                    <label for="id_dokter" class="form-label">ID Dokter</label>
                                    <select class="form-control" id="id_dokter" required name="id_dokter">
                                        <option value="" disabled selected>Pilih ID Dokter...
                                        </option>
                                        <?php foreach ($idDokterOptions as $idDokterOption) { ?>
                                            <option value="<?= $idDokterOption; ?>">
                                                <?= $idDokterOption ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    // require '../../../backend/config/db-klinik.php';
                                    
                                    $dokterQuery = mysqli_query($db_connect, "SELECT * FROM dokter");
                                    $dokterOptions = array();

                                    while ($dokterRow = mysqli_fetch_assoc($dokterQuery)) {
                                        $dokterOptions[] = $dokterRow['nama_dokter'];
                                    }

                                    ?>
                                    <label for="namaDokter" class="form-label">Dokter</label>
                                    <select class="form-control" id="namaDokter" required name="namaDokter">
                                        <option value="" disabled selected>Pilih Dokter...
                                        </option>
                                        <?php foreach ($dokterOptions as $dokterOption) { ?>
                                            <option value="<?= $dokterOption; ?>">
                                                <?= $dokterOption; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    // require '../../../backend/config/db-klinik.php';
                                    
                                    $spesialisQuery = mysqli_query($db_connect, "SELECT * FROM dokter");
                                    $spesialisOptions = array();

                                    while ($spesialisRow = mysqli_fetch_assoc($spesialisQuery)) {
                                        $spesialisOptions[] = $spesialisRow['spesialisasi'];
                                    }

                                    ?>
                                    <label for="spesialis" class="form-label">Spesialis</label>
                                    <select class="form-control" id="spesialis" required name="spesialis">
                                        <option value="" disabled selected>Pilih Spesialis...
                                        </option>
                                        <?php foreach ($spesialisOptions as $spesialisOption) { ?>
                                            <option value="<?= $spesialisOption; ?>">
                                                <?= $spesialisOption; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="hariPraktek">Hari Praktek</label>
                                    <input type="text" class="form-control" name="hariPraktek" id="hariPraktek">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jamMulai">Jam Mulai Praktek</label>
                                    <input type="time" class="form-control" name="jamMulai" id="jamMulai">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jamSelesai">Jam Selesai Praktek</label>
                                    <input type="time" class="form-control" name="jamSelesai" id="jamSelesai">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="tambahJadwalDokter" class="btn btn-success">Tambah</button>
                                <button class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>