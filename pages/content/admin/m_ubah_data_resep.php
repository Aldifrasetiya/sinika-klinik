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
                    <h4 class="page-title">Ubah Resep</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../../../pages/dashboard.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_data_resep.php">Data Resep</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_ubah_data_resep.php">Ubah Resep</a>
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
                    $id_resep = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM resep WHERE id_resep = '$id_resep'");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="proses/proses_data_resep.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_resep" id="id_resep" value="<?= $row['id_resep']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="id_pasien">ID Pasien</label>
                                            <input type="text" class="form-control" name="id_pasien" id="id_pasien"
                                                value="<?= $row['id_pasien']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_dokter">ID Dokter</label>
                                            <input type="text" class="form-control" name="id_dokter" id="id_dokter"
                                                value="<?= $row['id_dokter']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_obat">ID Obat</label>
                                            <input type="text" class="form-control" name="id_obat" id="id_obat"
                                                value="<?= $row['id_obat']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tglResep">Tanggal resep</label>
                                            <input type="date" class="form-control" name="tglResep" id="tglResep"
                                                value="<?= $row['tgl_resep']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="namaObat">Nama Obat</label>
                                            <input type="text" class="form-control" name="namaObat" id="namaObat"
                                                value="<?= $row['nama_obat']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jmlhObat">Jumlah Obat</label>
                                            <input type="text" class="form-control" name="jmlhObat" id="jmlhObat"
                                                value="<?= $row['jumlah_obat']; ?>">
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <input type="hidden" name="ubahResep" value="ubahResep">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                        <button class="btn btn-danger">Batal</button>
                                    </div>
                                </div>
                        </form>
                        <?php
                    } else {
                        echo "Data Resep tidak ditemukan";
                    }
                } else {
                    echo "ID Resep tidak diberikan";
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