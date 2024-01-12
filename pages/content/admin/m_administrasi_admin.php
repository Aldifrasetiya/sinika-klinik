<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_antrian_pasien.php");

?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Tambah Kelengkapan Admin</h4>
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
                            <a href="m_data_pasien.php">Kelengkapan Administrasi</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_pasien.php">Tambah Kelengkapan Admin</a>
                        </li>
                    </ul>
                </div>
                <form action="../../../backend/proses_administrasi_admin.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php
                                    // require '../../../backend/config/db-klinik.php';
                                    
                                    $db = new DB("localhost", "root", "", "db_klinik");
                                    $connect = $db->connect();

                                    $idUsersQuery = mysqli_query($connect, "SELECT * FROM users");
                                    $idUsersOptions = array();

                                    while ($idUsersRow = mysqli_fetch_assoc($idUsersQuery)) {
                                        $idUsersOptions[] = $idUsersRow['id_users'];
                                    }

                                    ?>
                                    <label for="id_users" class="form-label">ID Users</label>
                                    <select class="form-control" id="id_users" required name="id_users">
                                        <option value="" disabled selected>Pilih ID Users...
                                        </option>
                                        <?php foreach ($idUsersOptions as $idUsersOption) { ?>
                                            <option value="<?= $idUsersOption; ?>">
                                                <?= $idUsersOption ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaAdmin">Nama Admin</label>
                                    <input type="text" class="form-control" name="namaAdmin" id="namaAdmin">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk">
                                        <option disabled selected>--PILIH--</option>
                                        <option>LAKI-LAKI</option>
                                        <option>PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notlp">No Telepon</label>
                                    <input type="text" class="form-control" name="notlp" id="notlp">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="tambahAdministrasiAdmin"
                                    class="btn btn-success mx-2">Tambah</button>
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
            </div>
        </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>