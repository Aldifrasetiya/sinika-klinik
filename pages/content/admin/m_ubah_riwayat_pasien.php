<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Ubah Riwayat Pasien</h4>
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
                            <a href="m_riwayat_pasien.php">Riwayat Pasien</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_ubah_riwayat_pasien.php">Ubah Riwayat Pasien</a>
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
                    $id_riwayat = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM riwayat_pasien WHERE id_riwayat = $id_riwayat ");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="proses/proses_riwayat_pasien.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_riwayat" id="id_riwayat"
                                            value="<?= $row['id_riwayat']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="id_pasien">ID Pasien</label>
                                            <input type="text" class="form-control" name="id_pasien" id="id_pasien"
                                                value="<?= $row['id_pasien']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tgl">Tanggal</label>
                                            <input type="date" class="form-control" name="tgl" id="tgl"
                                                value="<?= $row['tanggal']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jp">Jenis Pelayanan</label>
                                            <input type="text" class="form-control" name="jp" id="jp"
                                                value="<?= $row['jenis_pelayanan']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ket">Keterangan</label>
                                            <input type="text" class="form-control" name="ket" id="ket"
                                                value="<?= $row['keterangan']; ?>">
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