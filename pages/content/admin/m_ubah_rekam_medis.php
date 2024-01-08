<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_rekam_medis.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Ubah Rekam Medis</h4>
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
                            <a href="m_rekam_medis.php">Rekam Medis</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_ubah_rekam_medis.php">Ubah Rekam Medis</a>
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

                if (isset($_GET['id'])) {
                    $id_rekam_medis = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM rekam_medis WHERE id_rekam_medis = $id_rekam_medis ");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="../../../backend/proses_rekam_medis.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_rekam_medis" id="id_rekam_medis"
                                            value="<?= $row['id_rekam_medis']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="id_pasien">ID Pasien</label>
                                            <input type="text" class="form-control" name="id_pasien" id="id_pasien"
                                                value="<?= $row['id_pasien']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="rp">Riwayat Penyakit</label>
                                            <input type="text" class="form-control" name="rp"
                                                id="rp" "<?= $row['riwayat_penyakit']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alergi">Alergi</label>
                                            <input type="text" class="form-control" name="alergi"
                                                id="alergi" "<?= $row['alergi']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ct">Catatan Lain</label>
                                            <input type="text" class="form-control" name="ct"
                                                id="ct" "<?= $row['catatan_lain']; ?>">
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                                        <button class=" btn btn-danger">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        echo ".";
                    }
                } else {
                    echo "ID dokter tidak diberikan";
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