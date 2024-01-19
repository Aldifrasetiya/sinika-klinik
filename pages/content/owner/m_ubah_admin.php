<?php
session_start();
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_owner.php");


?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Ubah Data Admin</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../dashboard/d.owner">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_data_user.php">Data Admin</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_ubah_admin.php">Ubah Data Admin</a>
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
                require('../../../backend/config/db-klinik.php');

                if (isset($_GET['id'])) {
                    $id_users = $_GET['id'];

                    $result = mysqli_query($db_connect, "SELECT * FROM users WHERE id_users = $id_users ");
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="proses/proses_data_admin.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <input type="hidden" name="id_users" id="id_users" value="<?= $row['id_users']; ?>">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                value="<?= $row['nama_users']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select class="form-control" name="jk" id="jk" value="<?= $row['jk']; ?>">
                                                <option disabled selected>--PILIH--</option>
                                                <option>LAKI-LAKI</option>
                                                <option>PEREMPUAN</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat"
                                                value="<?= $row['alamat_users']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="notlp">No telepon</label>
                                            <input type="text" class="form-control" name="notlp" id="notlp"
                                                value="<?= $row['notlp_users']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                value="<?= $row['username']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="<?= $row['email']; ?>">
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password"
                                                value="<?= $row['password']; ?>">
                                        </div> -->
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" name="UbahAdmin" class="btn btn-success mx-2">Simpan</button>
                                        <a class="btn btn-danger" href="m_data_user">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        echo "Jadwal Dokter tidak ditemukan.";
                    }
                } else {
                    echo "ID dokter tidak diberikan";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>