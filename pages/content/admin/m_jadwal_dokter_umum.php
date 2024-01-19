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
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Jadwal Dokter Umum</h4>
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
                            <a href="m_jadwal_dokter_umum">Jadwal Dokter Umum</a>
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
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="m_tambah_jadwal_dokter.php" type="button" class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </span>
                                    Tambah Jadwal Dokter
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID Jadwal Dokter</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialis</th>
                                            <th>Hari Praktek</th>
                                            <th>Jam Mulai Praktek</th>
                                            <th>Jam Selesai Praktek</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            require '../../../backend/config/db-klinik.php';

                                            $jadwalDokter = mysqli_query($db_connect, "SELECT jadwal_dokter.*, dokter.nama_dokter, dokter.spesialisasi, dokter.notlp_dokter
                                            FROM jadwal_dokter
                                            INNER JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter");

                                            while ($row = mysqli_fetch_array($jadwalDokter)) {
                                                ?>
                                            <tr>
                                                <td>
                                                    <?= $row['id_jadwal_dokter']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['nama_dokter']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['spesialisasi']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['hari_praktek']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['jam_mulai_praktek']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['jam_selesai_praktek']; ?>
                                                </td>
                                                <td style='vertical-align: middle;'>
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <a
                                                            href='m_ubah_jadwal_dokter.php?id=<?= $row['id_jadwal_dokter']; ?>'>
                                                            <button type="button" class="btn btn-warning">Edit</button>
                                                        </a>
                                                        <button type="button"
                                                            href='proses/proses_jadwal_dokter.php?id_jadwal_dokter=<?= $row['id_jadwal_dokter']; ?>'
                                                            class='btn btn-danger delete'>Hapus</button>
                                                    </div>
                                                </td>
                                                <td style='vertical-align: middle;'></td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const SweetAlert2Demo = function () {
        const initDemos = function () {
            $('.delete').click(function (e) {
                var url = e.target.getAttribute('href');
                swal({
                    title: 'Yakin ingin menghapus?',
                    text: "Data tidak bisa kembali jika terhapus!",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Hapus',
                            className: 'btn btn-success'
                        },
                        cancel: {
                            text: 'Batal',
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        swal({
                            title: 'Data Terhapus!',
                            text: 'Data Jadwal Dokter Terhapus',
                            type: 'success',
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            }

                        });
                        setTimeout(function () {
                            window.location.href = url;
                        }, 2000);
                    } else {
                        swal.close();
                    }
                });
            });
        };
        return {
            //== Init
            init: function () {
                initDemos();
            },
        };
    }();

    //== Class Initialization
    jQuery(document).ready(function () {
        SweetAlert2Demo.init();
    });
</script>

<?php
// require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>