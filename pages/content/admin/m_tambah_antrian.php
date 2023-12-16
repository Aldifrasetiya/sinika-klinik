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
                <form action="../../../backend/proses_antrian_pasien.php"></form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_antrian">ID Antrian</label>
                                <input type="text" class="form-control" name="id_antrian" id="id_antrian"
                                    value="<?php echo $id_antrian_baru; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="namaPasien" id="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alamat">Dokter</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Dokter A</option>
                                    <option value="">Dokter B</option>
                                    <option value="">Dokter C</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="notlp">No Telepon</label>
                                <input type="text" class="form-control" name="notlp" id="notlp">
                            </div>
                        </div>
                        <div class="card-action">
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