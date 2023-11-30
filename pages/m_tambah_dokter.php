<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");


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
                            <a href="m_dokter_umum.php">Jadwal Dokter Umum</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_atrian.php">Tambah Jadwal Dokter Umum</a>
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
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" class="form-control" id="spesialis">
                        </div>
                        <div class="mb-3">
                            <label for="notlp">No Telepon</label>
                            <input type="text" class="form-control" id="notlp">
                        </div>
                        <div class="mb-3">
                            <label for="hari">Hari</label>
                            <input type="date" class="form-control" id="hari">
                        </div>
                        <div class="mb-3">
                            <label for="jamPraktek">Jam Praktek</label>
                            <input type="time" class="form-control" id="jamPraktek">
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