<?php
session_start();

if ($_SESSION['role'] != 'owner') {
    header('Location: ../../login.php');
    exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_owner.php");
?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Admin</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../dashboard/dashboard.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_data_user.php">Data Admin</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <a href="m_tambah_admin.php" type="button" class="btn btn-primary">
                                        <span class="btn-label">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </span>
                                        Tambah Admin
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Users</th>
                                                <th>Nama</th>
                                                <th>JK</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require '../../../backend/config/db-klinik.php';
                                            $dataUsers = mysqli_query($db_connect, "SELECT * FROM users");
                                            // $arr = mysqli_fetch_assoc($dataUsers);
                                            while ($row = mysqli_fetch_array($dataUsers)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $row['id_users']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['nama_users']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['jk_users']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['alamat_users']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['notlp_users']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['username']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['role']; ?>
                                                    </td>
                                                    <td style='vertical-align: middle;'>
                                                        <div style="display: flex; align-items: center; gap: 10px">
                                                            <a href="m_ubah_admin?id=<?= $row['id_users']; ?>">
                                                                <button type="button" class="btn btn-warning">Edit</button>
                                                            </a>
                                                            <button
                                                                href="../../../backend/proses_pasien.php?id_users=<?= $row['id_users']; ?>"
                                                                type="button" class="btn btn-danger delete">Hapus</button>
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
                            text: 'Data Pasien Terhapus',
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