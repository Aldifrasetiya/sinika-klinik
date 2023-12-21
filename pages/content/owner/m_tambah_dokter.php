<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_owner.php");
require_once("{$base_dir}backend{$ds}proses_jadwal_dokter.php");


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
                <form action="../../../backend/proses_jadwal_dokter.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label for="id_dokter">ID Dokter</label>
                                    <input type="text" class="form-control" name="id_dokter" id="id_dokter"
                                        value="<?php echo $id_dokter; ?>" readonly>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="name">Nama Dokter</label>
                                    <input type="text" class="form-control" name="namaDokter" id="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="spesialis">Spesialis</label>
                                    <input type="text" class="form-control" name="spesialis" id="spesialis">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notlp">No Telepon</label>
                                    <input type="text" class="form-control" name="notlp" id="notlp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="hari">Hari</label>
                                    <input type="text" class="form-control" name="hariPraktek" id="hariPraktek">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jamPraktek">Jam Praktek</label>
                                    <input type="time" class="form-control" name="jamPraktek" id="jamPraktek">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="Tambah" class="btn btn-success">Tambah</button>
                                <button class="btn btn-danger">Batal</button>
                            </div>
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