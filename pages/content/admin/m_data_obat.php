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
                    <h4 class="page-title">Data Obat</h4>
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
                            <a href="m_data_atrian.php">Obat</a>
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
                                                <div style='display: flex; align-items: center; gap: 10px;'>
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
                            text: 'Data Obat Terhapus',
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