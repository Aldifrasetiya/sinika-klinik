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
                    <h4 class="page-title">Ubah Data Antrian</h4>
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
                            <a href="m_data_antrian.php">Data Antrian</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_ubah_data_antrian.php">Ubah Data Antrian</a>
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
                require '../../../backend/config/db-klinik.php';

                if (isset($_GET['no_antrian'])) {
                    $no_antrian = $_GET['no_antrian'];

                    $result = mysqli_query($db_connect, "SELECT * FROM antrian WHERE no_antrian = $no_antrian ");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="proses/proses_antrian_pasien.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_antrian" id="id_antrian"
                                            value="<?= $row['id_antrian']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="noAntrian">Nomor antrian</label>
                                            <input type="text" class="form-control" name="noAntrian" id="noAntrian"
                                                value="<?= $row['no_antrian']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_pasien">Atas Nama Pasien</label>
                                            <input type="text" class="form-control" name="atas_nama_pasien"
                                                id="atas_nama_pasien" value="<?= $row['atas_nama_pasien']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_dokter">ID Dokter</label>
                                            <input type="text" class="form-control" name="id_dokter" id="id_dokter"
                                                value="<?= $row['id_dokter']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php
                                            $stsAntrianQuery = "SHOW COLUMNS FROM antrian LIKE 'status_antrian'";
                                            $stsAntrianResult = mysqli_query($db_connect, $stsAntrianQuery);

                                            $enumValues = null;
                                            if ($stsAntrianResult) {
                                                $rowEnum = mysqli_fetch_assoc($stsAntrianResult);
                                                if (isset($rowEnum['Type'])) {
                                                    preg_match_all("/'([^']+)'/", $rowEnum['Type'], $enumMatches);
                                                    $enumValues = $enumMatches[1];
                                                }
                                            }
                                            ?>
                                            <label for="statusAntrian" class="form-label">Status Antrian</label>
                                            <select class="form-control" id="statusAntrian" required name="statusAntrian">
                                                <option value="" disabled selected>Pilih status antrian...</option>
                                                <?php
                                                if ($enumValues) {
                                                    foreach ($enumValues as $enumValue) {
                                                        ?>
                                                        <option value="<?= $enumValue; ?>" <?= ($enumValue == $row['status_antrian']) ? 'selected' : ''; ?>>
                                                            <?= $enumValue; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <!-- <input type="hidden" name="editAntrian" id="editAntrian" value="editAntrian"> -->
                                        <button type="submit" class="btn btn-warning" name="editAntrian">Simpan</button>
                                        <a class="btn btn-danger" href="m_data_antrian">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        echo "Antrian tidak ditemukan.";
                    }
                } else {
                    echo "Nomor antrian tidak diberikan";
                }
                ?>

            </div>
        </div>
    </div>
    </div>
</body>

<?php
// require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>