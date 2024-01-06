<?php
session_start();
require '../../../backend/config/db-klinik.php';

if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'owner') {
    session_destroy();
    header('Location:./../index.php');
    exit;
}

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
                    <h4 class="page-title">Data Antrian</h4>
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
                            <a href="../admin/m_data_atrian.php">Data Antrian</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Antrian</th>
                                                    <th>Atas Nama Pasien</th>
                                                    <th>ID Dokter</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $antrianPasien = mysqli_query($db_connect, "SELECT * FROM antrian");
                                                $no = 1;

                                                while ($row = mysqli_fetch_array($antrianPasien)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $no++; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['no_antrian']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['atas_nama_pasien']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['id_dokter']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['status_antrian']; ?>
                                                        </td>
                                                        <td style='vertical-align: middle;'>
                                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                                <a
                                                                    href="m_ubah_data_antrian.php?no_antrian=<?= $row['no_antrian']; ?>">
                                                                    <button type="button"
                                                                        class='btn btn-warning'>Edit</button>
                                                                </a>
                                                                <button type="button"
                                                                    href='../../../backend/proses_antrian_pasien.php?no_antrian=<?= $row['no_antrian']; ?>'
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
            </div>
        </div>
    </div>

    <!-- Modal Edit Antrian -->


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
                                text: 'Data Antrian Pasien Terhapus',
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
                init: function () {
                    initDemos();
                },
            };
        }();

        jQuery(document).ready(function () {
            SweetAlert2Demo.init();
        });
    </script>
</body>