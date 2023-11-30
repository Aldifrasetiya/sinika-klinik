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
                    <h4 class="page-title">Tambah Data Pasien</h4>
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
                            <a href="m_data_atrian.php">Data Pasien</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_atrian.php">Tambah Data Pasien</a>

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
                    <div class="col-lg-12">
                        <div class="mb-4 col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-4 col-md-6">
                            <label>Jenis Kelamin</label><br />
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                                <span class="form-radio-sign">LAKI-LAKI</span>
                            </label>
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                                <span class="form-radio-sign">PEREMPUAN</span>
                            </label>
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="penyakit">Jenis Penyakit</label>
                            <input type="text" class="form-control" id="penyakit">
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="ttl">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="ttl">
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="ttl">Alamat</label>
                            <input type="text" class="form-control" id="ttl">
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