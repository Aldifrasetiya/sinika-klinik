<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Tambah Atrian</h4>
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
                            <a href="../admin/m_data_antrian.php">Data Antrian</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_antrian.php">Tambah Antrian</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-6">
                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="namaPasien" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="notlp">No Telepon</label>
                            <input type="text" class="form-control" name="notlp" id="notlp">
                        </div>
                        <div class="card-action m-2">
                            <button class="btn btn-success">Tambah</button>
                            <button class="btn btn-danger">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>