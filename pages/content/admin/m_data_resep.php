<?php
session_start();
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
                    <h4 class="page-title">Resep</h4>
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
                            <a href="m_data_resep.php">Resep</a>
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
                                <a href="m_tambah_data_resep.php" type="button" class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                    Tambah Resep
                                </a>
                            </div>
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Resep</th>
                                        <th>ID Pasien</th>
                                        <th>ID Dokter</th>
                                        <th>ID Obat</th>
                                        <th>Tanggal Resep</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah Obat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $dataResep = mysqli_query(
                                            $db_connect,

                                            "SELECT resep.*, pasien.nama_pasien, pasien.tanggal_lahir, pasien.jk, pasien.penyakit, pasien.jenis_asuransi, pasien.no_asuransi, 
                                        dokter.nama_dokter, dokter.spesialisasi, dokter.notlp_dokter,
                                        obat.nama_obat, obat.jenis_obat, obat.harga 
                                        FROM resep
                                        JOIN dokter ON resep.id_dokter = dokter.id_dokter
                                        JOIN pasien ON resep.id_pasien = pasien.id_pasien
                                        JOIN obat ON resep.id_obat = obat.id_obat"
                                        );

                                        while ($row = mysqli_fetch_array($dataResep)) {
                                            ?>
                                            <td>
                                                <?= $row['id_resep']; ?>
                                            </td>
                                            <td>
                                                <?= $row['id_pasien']; ?>
                                            </td>
                                            <td>
                                                <?= $row['id_dokter']; ?>
                                            </td>
                                            <td>
                                                <?= $row['id_obat']; ?>
                                            </td>
                                            <td>
                                                <?= $row['tgl_resep']; ?>
                                            </td>
                                            <td>
                                                <?= $row['nama_obat'] ?>
                                            </td>
                                            <td>
                                                <?= $row['jumlah_obat'] ?>
                                            </td>
                                            <td style='vertical-align: middle;'>
                                                <div style='display: flex; align-items: center; gap: 10px;'>
                                                    <a href='m_ubah_data_obat.php?id=<?= $row['id_resep']; ?>'>
                                                        <button type="button" class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <button type="button"
                                                        href='../../../backend/proses_data_resep.php?id_resep=<?= $row['id_resep']; ?>'
                                                        class='btn btn-danger delete'>Hapus</button>
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
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>