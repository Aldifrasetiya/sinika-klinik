<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}h_pasien.php");

?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Pendaftaran</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="d_pasien.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="p_pendaftaran">Daftar Antrian</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <div class="mt-5 col-md-12">
                    <form>
                        <div class="mb-3 col-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="notlp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="notlp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlSelect1">Asuransi</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>--PILIH--</option>
                                <option>BPJS</option>
                                <option>Non BPJS</option>
                                <option>Asuransi lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="noBpjs" class="form-label">Masukkan No BPJS</label>
                            <input type="text" class="form-control" id="noBpjs">
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>