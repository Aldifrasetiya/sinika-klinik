<?php
session_start();

require '../../../backend/config/db-klinik.php';
require '../../../backend/login.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new Auth($db_connect);
    $result = $auth->loginUser($email, $password);

    if ($result !== true) {
        echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: '$result',
            });
          </script>";
    } else {
        $_SESSION['username'] = $email;
        $_SESSION['role'] = 'admin';
    }
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../login.php');
    exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Tambah Rekam Medis</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../dashboard/dashboard">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_rekam_medis.php">Rekam Medis</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_rekam_medis.php">Tambah Rekam Medis</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <form action="proses/proses_rekam_medis.php" method="POST">
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
                                    <label for="rp">Riwayat Penyakit</label>
                                    <input type="text" class="form-control" name="rp" id="rp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alergi">Alergi</label>
                                    <input type="text" class="form-control" name="alergi" id="alergi">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ct">Catatan Lain</label>
                                    <input type="text" class="form-control" name="ct" id="ct">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                                <a class="btn btn-danger" href="m_rekam_medis">Batal</a>
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