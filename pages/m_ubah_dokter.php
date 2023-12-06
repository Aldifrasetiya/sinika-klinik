<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__).$ds.'..').$ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}backend{$ds}proses_jadwal_dokter.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Ubah Jadwal Dokter Umum</h4>
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
                            <a href="proses_jadwal_dokter.php">Ubah Jadwal Dokter Umum</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <?php
                require('./../backend/config/db-klinik.php');

                if(isset($_GET['id'])) {
                    $id_dokter = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM jadwal_dokter WHERE id_dokter = $id_dokter ");
                    if(mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="./../backend/proses_jadwal_dokter.php" method="POST">
                            <div class="row">
                                <div class="col-md-3 col-lg-6">
                                    <div class="mb-3">
                                        <input type="hidden" name="id_dokter" id="id_dokter" value="<?= $row['id_dokter']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">Nama Dokter</label>
                                        <input type="text" class="form-control" name="namaDokter" id="namaDokter"
                                            value="<?= $row['nama_dokter']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="spesialis">Spesialis</label>
                                        <input type="text" class="form-control" name="spesialis" id="spesialis"
                                            value="<?= $row['spesialis']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="notlp">No Telepon</label>
                                        <input type="text" class="form-control" name="notlp" id="notlp"
                                            value="<?= $row['no_hp']; ?> ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hari">Hari Praktek</label>
                                        <input type="date" class="form-control" name="hariPraktek" id="hariPraktek"
                                            value="<?= $row['hari_praktek']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jamPraktek">Jam Praktek</label>
                                        <input type="time" class="form-control" name="jamPraktek" id="jamPraktek"
                                            value="<?= $row['jam_praktek']; ?>">
                                    </div>
                                    <div class="card-action m-2">
                                        <input type="hidden" name="UbahJadwal" id="UbahJadwal" value="UbahJadwal">
                                        <button type="submit" class="btn btn-warning" name="UbahJadwal">Ubah</button>
                                        <button class=" btn btn-danger">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        echo "Jadwal Dokter tidak ditemukan.";
                    }
                } else {
                    echo "ID dokter tidak diberikan";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>