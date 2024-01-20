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
                    <h4 class="page-title">Data Obat</h4>
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
                            <a href="m_data_obat.php">Obat</a>
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
                                    Tambah Obat
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
                                        require '../../../backend/config/db-klinik.php';
                                        $dataObat = mysqli_query($db_connect, "SELECT * FROM obat");
                                        $no = 1;

                                        while ($row = mysqli_fetch_array($dataObat)) {
                                            ?>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
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
                                            <td style='vertical-align: middle;'>
                                                <div style="display: flex; align-items: center; gap: 10px;">
                                                    <a href='m_ubah_data_obat.php?id=<?= $row['id_obat']; ?>'>
                                                        <button type="button" class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <button type="button"
                                                        href='proses/proses_data_obat.php?id_obat=<?= $row['id_obat']; ?>'
                                                        class='btn btn-danger delete'>Hapus</button>
                                                </div>
                                            </td>
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
</body>
<script>
    const SweetAlert2Demo = function () {
        const initDemos = function () {
            $('.delete').click(function (e) {
                e.preventDefault(); // Mencegah navigasi langsung ke URL href

                var id_obat = $(this).data('id_obat');
                var url = "proses/proses_data_obat.php?id_obat=" + id_obat;

                swal({
                    title: 'Yakin ingin menghapus?',
                    text: "Data tidak bisa kembali jika terhapus!",
                    icon: 'warning',
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
                    // Membuat request AJAX ke backend
                    if (Delete) {
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            success: function (result) {
                                if (result.status == 'success') {
                                    swal({
                                        title: 'Sukses',
                                        text: result.message,
                                        icon: 'success',
                                        buttons: {
                                            confirm: {
                                                className: 'btn btn-success'
                                            }
                                        }
                                    }).then(() => {
                                        window.location.href = 'm_data_obat.php';
                                    });
                                } else {
                                    swal({
                                        title: 'Error',
                                        text: result.message,
                                        icon: 'error',
                                        buttons: {
                                            confirm: {
                                                className: 'btn btn-danger'
                                            }
                                        }
                                    });
                                }
                            },
                            error: function () {
                                swal({
                                    title: 'Error',
                                    text: 'Terjadi kesalahan saat melakukan operasi hapus.',
                                    icon: 'error',
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-danger'
                                        }
                                    }
                                });
                            }
                        });
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