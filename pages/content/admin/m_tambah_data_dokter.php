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
                    <h4 class="page-title">Tambah Data Dokter Umum</h4>
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
                            <a href="m_data_dokter.php">Data Dokter Umum</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_data_dokter.php">Tambah Data Dokter Umum</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <form action="proses/proses_data_dokter.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
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
                                    <label for="jdwraktek">Jadwal Praktek</label>
                                    <input type="text" class="form-control" name="jdwPraktek" id="jdwPraktek">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="tambahDokter" class="btn btn-success">Tambah</button>
                                <a class="btn btn-danger" href="m_data_dokter">Batal</a>
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