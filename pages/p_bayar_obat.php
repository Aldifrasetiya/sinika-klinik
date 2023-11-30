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
                    <h4 class="page-title">Pembayaran Obat</h4>
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
                            <a href="#">Jadwal Dokter</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Dokter</th>
                                            <th>Nama</th>
                                            <th>Spesialis</th>
                                            <th>No Telepon</th>
                                            <th>Jam Praktek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>DKT0001</td>
                                            <td>dr. Aldi Frasetiya</td>
                                            <td>Dokter Umum Gigi</td>
                                            <td>081234567890</td>
                                            <td>08:00 - 12:00</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>2</td>
                                            <td>DKT0002</td>
                                            <td>dr. Teguh Pratama</td>
                                            <td>Dokter Umum Anak</td>
                                            <td>083214567890</td>
                                            <td>12:00 - 18:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Cetak Antrian Obat</button>
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