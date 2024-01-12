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
                    <h4 class="page-title">Tambah Obat</h4>
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
                            <a href="m_data_obat.php">Data Obat</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_atrian.php">Tambah Obat</a>
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
                    $id_obat = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM obat WHERE id_obat = '$id_obat'");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="proses/proses_data_obat.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_obat" id="id_obat" value="<?= $row['id_obat']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama Obat</label>
                                            <input type="text" class="form-control" name="namaObat" id="namaObat"
                                                value="<?= $row['nama_obat']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jenis">Jenis</label>
                                            <input type="text" class="form-control" name="jenis" id="jenis"
                                                value="<?= $row['jenis_obat']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga"
                                                value="<?= $row['harga']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control" name="stok" id="stok"
                                                value="<?= $row['stok']; ?>">
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <input type="hidden" name="ubahObat" value="ubahObat">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                        <button class="btn btn-danger">Batal</button>
                                    </div>
                                </div>
                        </form>
                        <?php
                    } else {
                        echo "Data Obat tidak ditemukan";
                    }
                } else {
                    echo "ID Obat tidak diberikan";
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