<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_pasien.php");

?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Rekam Medis</h4>
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
                            <a href="m_rekam_medis.php">Rekam Medis</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="m_tambah_rekam_medis.php" class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </span>
                                    Tambah Rekam Medis
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Rekam Medis</th>
                                            <th>ID Pasien</th>
                                            <th>Riwayat Penyakit</th>
                                            <th>Alergi</th>
                                            <th>Catatan Lain</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $dataRekamMedis = mysqli_query($db_connect, "SELECT * FROM rekam_medis");

                                        while ($row = mysqli_fetch_array($dataRekamMedis)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $row['id_rekam_medis']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['id_pasien']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['riwayat_penyakit']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['alergi']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['catatan_lain']; ?>
                                                </td>
                                                <td style='vertical-align: middle;'>
                                                    <div style="display: flex; align-items: center; gap: 10px">
                                                        <a href="m_ubah_rekam_medis.php?id=<?= $row['id_rekam_medis']; ?>">
                                                            <button type="button" class="btn btn-warning">Edit</button>
                                                        </a>
                                                        <button type="button"
                                                            href='../../../backend/proses_rekam_medis.php?id_rekam_medis=<?= $row['id_rekam_medis']; ?>'
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
                            text: 'Data Pasien Berhasil di hapus',
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