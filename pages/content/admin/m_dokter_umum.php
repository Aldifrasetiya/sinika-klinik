<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_admin.php");
require_once("{$base_dir}backend{$ds}proses_jadwal_dokter.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Jadwal Dokter Umum</h4>
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
                            <a href="./../pages/content/admin/m_dokter_umum.php">Jadwal Dokter Umum</a>
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
                                <a href="m_tambah_dokter.php" type="button" class="btn btn-primary">
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
                                            <th>#</th>
                                            <th>ID Dokter</th>
                                            <th>Nama</th>
                                            <th>Spesialis</th>
                                            <th>No Telepon</th>
                                            <th>Hari Praktek</th>
                                            <th>Jam Praktek</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            $jadwalDokter = mysqli_query($db_connect, "SELECT * FROM jadwal_dokter");
                                            $no = 1;

                                            while ($row = mysqli_fetch_array($jadwalDokter)) {
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
                                                    <?= $row['spesialis']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['no_hp']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['hari_praktek']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['jam_praktek']; ?>
                                                </td>
                                                <td style='vertical-align: middle;'>
                                                    <a href='m_ubah_dokter.php?id=<?= $row['id_dokter']; ?>'>
                                                        <button type="button" class="btn btn-warning">Edit</button>
                                                    </a>
                                                </td>
                                                <td style='vertical-align: middle;'><button type="button"
                                                        href='../../../backend/proses_jadwal_dokter.php?id_dokter=<?= $row['id_dokter']; ?>'
                                                        class='btn btn-danger delete'>Hapus</button></td>
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