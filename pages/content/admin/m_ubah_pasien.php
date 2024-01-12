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
                    <h4 class="page-title">Ubah Data Pasien</h4>
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
                            <a href="m_data_pasien.php">Data Pasien</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_ubah_dokter.php">Ubah Data Pasien</a>
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
                require('../../../backend/config/db-klinik.php');

                if (isset($_GET['id'])) {
                    $id_pasien = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM pasien WHERE id_pasien = $id_pasien ");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="proses/proses_pasien.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $row['id_pasien']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="namePasien">Nama Pasien</label>
                                            <input type="text" class="form-control" name="namaPasien" id="namaPasien"
                                                value="<?= $row['nama_pasien']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat"
                                                value="<?= $row['alamat']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ttl">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="ttl" id="ttl"
                                                value="<?= $row['tanggal_lahir']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select class="form-control" name="jk" id="jk" value="<?= $row['jk']; ?>">
                                                <option disabled selected>Pilih Jenis Kelamin ...</option>
                                                <option>LAKI-LAKI</option>
                                                <option>PEREMPUAN</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="notlp">No telepon</label>
                                            <input type="text" class="form-control" name="notlp" id="notlp"
                                                value="<?= $row['no_telepon']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="penyakit">Jenis Penyakit</label>
                                            <input type="text" class="form-control" name="penyakit" id="penyakit"
                                                value="<?= $row['penyakit']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="asuransi">Asuransi</label>
                                            <select class="form-control" name="asuransi" id="asuransi"
                                                value="<?= $row['jenis_asuransi'] ?>">
                                                <option disabled selected>Pilih Asuransi ...</option>
                                                <option>BPJS</option>
                                                <option>Non BPJS</option>
                                                <option>Asuransi lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6" id="noBpjsInput" style="display: none;">
                                            <label for="noAsuransi" class="form-label">Masukkan No Asuransi</label>
                                            <input type="text" class="form-control" name="noAsuransi" id="noAsuransi">
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" name="UbahPasien" class="btn btn-success mx-2">Tambah</button>
                                        <button class="btn btn-danger">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.getElementById("asuransi").addEventListener("change", function () {
                                    const selectedOption = this.value;
                                    const noBpjsInput = document.getElementById("noBpjsInput");

                                    if (selectedOption === "BPJS" || selectedOption === "Asuransi lainnya") {
                                        noBpjsInput.style.display = "block";
                                    } else {
                                        noBpjsInput.style.display = "none";
                                    }
                                });
                            </script>
                        </form>
                        <?php
                    } else {
                        echo "Data Pasien tidak ditemukan.";
                    }
                } else {
                    echo "ID Pasien tidak diberikan";
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