<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Dokter Umum</h4>
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
                            <a href="./../pages/content/admin/m_data_dokter.php">Data Dokter Umum</a>
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
                                <a href="m_tambah_data_dokter" type="button" class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </span>
                                    Tambah Data Dokter Umum
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Dokter</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialis</th>
                                            <th>No Telepon</th>
                                            <th>Jadwal Praktek</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            require '../../../backend/config/db-klinik.php';

                                            $dokter = mysqli_query($db_connect, "SELECT * FROM dokter");
                                            $no = 1;

                                            while ($row = mysqli_fetch_array($dokter)) {
                                                ?>
                                            <tr>
                                                <td>
                                                    <?= $no++; ?>
                                                </td>
                                                <td>
                                                    <?= $row['id_dokter']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['nama_dokter']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['spesialisasi']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['notlp_dokter']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['jadwal_praktek']; ?>
                                                </td>
                                                <td style='vertical-align: middle;'>
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <a href='m_ubah_data_dokter.php?id=<?= $row['id_dokter']; ?>'>
                                                            <button type="button" class="btn btn-warning">Edit</button>
                                                        </a>
                                                        <button type="button"
                                                            href='proses/proses_data_dokter.php?id_dokter=<?= $row['id_dokter']; ?>'
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
                            text: 'Data Dokter Umum Berhasil Terhapus',
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