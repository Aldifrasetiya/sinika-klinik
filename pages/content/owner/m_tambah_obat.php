<?php
session_start();

if ($_SESSION['role'] != 'owner') {
    header('Location: ../../login.php');
    exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_data_obat.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Tambah Obat</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../dashboard/d.owner">
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
                <form action="../../../backend/proses_data_obat.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama Obat</label>
                                    <input type="text" class="form-control" name="namaObat" id="namaObat">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" class="form-control" name="jenis" id="jenis">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" name="stok" id="stok">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="Tambah" class="btn btn-success">Tambah</button>
                                <a class="btn btn-danger" href="m_data_obat">Batal</a>
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