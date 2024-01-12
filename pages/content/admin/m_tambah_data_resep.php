<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Tambah Resep</h4>
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
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_data_resep.php">Tambah Resep</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <form action="proses/proses_data_resep.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    require '../../../backend/config/db-klinik.php';

                                    $idPasienQuery = mysqli_query($db_connect, "SELECT * FROM pasien");
                                    $idPasienOptions = array();

                                    while ($idPasienRow = mysqli_fetch_assoc($idPasienQuery)) {
                                        $idPasienOptions[] = $idPasienRow['id_pasien'];
                                    }

                                    ?>
                                    <label for="id_pasien" class="form-label">ID Pasien</label>
                                    <select class="form-control" id="id_pasien" required name="id_pasien">
                                        <option value="" disabled selected>Pilih ID Pasien...
                                        </option>
                                        <?php foreach ($idPasienOptions as $idPasienOption) { ?>
                                            <option value="<?= $idPasienOption; ?>">
                                                <?= $idPasienOption; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    require '../../../backend/config/db-klinik.php';

                                    $idDokterQuery = mysqli_query($db_connect, "SELECT * FROM dokter");
                                    $idDokterOptions = array();

                                    while ($idDokterRow = mysqli_fetch_assoc($idDokterQuery)) {
                                        $idDokterOptions[] = $idDokterRow['id_dokter'];
                                    }

                                    ?>
                                    <label for="id_dokter" class="form-label">ID Dokter</label>
                                    <select class="form-control" id="id_dokter" required name="id_dokter">
                                        <option value="" disabled selected>Pilih ID Dokter...
                                        </option>
                                        <?php foreach ($idDokterOptions as $idDokterOption) { ?>
                                            <option value="<?= $idDokterOption; ?>">
                                                <?= $idDokterOption; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    require '../../../backend/config/db-klinik.php';

                                    $idObatQuery = mysqli_query($db_connect, "SELECT * FROM obat");
                                    $idObatOptions = array();

                                    while ($idObatRow = mysqli_fetch_assoc($idObatQuery)) {
                                        $idObatOptions[] = $idObatRow['id_obat'];
                                    }

                                    ?>
                                    <label for="id_obat" class="form-label">ID Obat</label>
                                    <select class="form-control" id="id_obat" required name="id_obat">
                                        <option value="" disabled selected>Pilih ID Obat...
                                        </option>
                                        <?php foreach ($idObatOptions as $idObatOption) { ?>
                                            <option value="<?= $idObatOption; ?>">
                                                <?= $idObatOption; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tglResep">Tanggal Resep</label>
                                    <input type="date" class="form-control" name="tglResep" id="tglResep">
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
                                    require '../../../backend/config/db-klinik.php';

                                    $namaObatQuery = mysqli_query($db_connect, "SELECT * FROM obat");
                                    $namaObatOptions = array();

                                    while ($namaObatRow = mysqli_fetch_assoc($namaObatQuery)) {
                                        $namaObatOptions[] = $namaObatRow['nama_obat'];
                                    }

                                    ?>
                                    <label for="namaObat" class="form-label">Nama Obat</label>
                                    <select class="form-control" id="namaObat" required name="namaObat">
                                        <option value="" disabled selected>Pilih Nama Obat...
                                        </option>
                                        <?php foreach ($namaObatOptions as $namaObatOption) { ?>
                                            <option value="<?= $namaObatOption; ?>">
                                                <?= $namaObatOption; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jmlhObat">Jumlah Obat</label>
                                    <input type="text" class="form-control" name="jmlhObat" id="jmlhObat">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="TambahResep" class="btn btn-success">Tambah</button>
                                <button class="btn btn-danger">Batal</button>
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