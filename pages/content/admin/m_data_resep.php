<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_data_obat.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Resep</h4>
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
                            <a href="m_data_atrian.php">Resep</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <!-- <h4 class="card-title">Add Row</h4> -->
                                </div>
                                <a href="m_tambah_obat.php" type="button" class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                    Tambah Resep
                                </a>
                            </div>
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Harga Obat</th>
                                        <th>Stok Obat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $dataObat = mysqli_query($db_connect, "SELECT * FROM obat");
                                        $no = 1;

                                        while ($row = mysqli_fetch_array($dataObat)) {
                                            ?>
                                            <td>
                                                <?= $row['id_obat']; ?>
                                            </td>
                                            <td>
                                                <?= $row['nama_obat']; ?>
                                            </td>
                                            <td>
                                                <?= $row['jenis_obat']; ?>
                                            </td>
                                            <td>
                                                <?= $row['harga']; ?>
                                            </td>
                                            <td>
                                                <?= $row['stok']; ?>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
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