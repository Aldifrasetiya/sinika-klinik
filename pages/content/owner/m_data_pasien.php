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
          <h4 class="page-title">Data Pasien</h4>
          <ul class="breadcrumbs">
            <li class="nav-home">
              <a href="../dashboard/d_owner.php">
                <i class="flaticon-home"></i>
              </a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="m_data_pasien.php">Data Pasien</a>
            </li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <a href="m_tambah_pasien.php" type="button" class="btn btn-primary">
                    <span class="btn-label">
                      <i class="fa-solid fa-user-plus"></i>
                    </span>
                    Tambah Pasien
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>ID Pasien</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>JK</th>
                        <th>Penyakit</th>
                        <th>No Telepon</th>
                        <th>Jenis Asuransi</th>
                        <th>No Asuransi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require '../../../backend/config/db-klinik.php';
                      $dataPasien = mysqli_query($db_connect, "SELECT * FROM pasien");

                      while ($row = mysqli_fetch_array($dataPasien)) {
                        ?>
                        <tr>
                          <td>
                            <?= $row['id_pasien']; ?>
                          </td>
                          <td>
                            <?= $row['nama_pasien']; ?>
                          </td>
                          <td>
                            <?= $row['alamat']; ?>
                          </td>
                          <td>
                            <?= $row['tanggal_lahir']; ?>
                          </td>
                          <td>
                            <?= $row['jk']; ?>
                          </td>
                          <td>
                            <?= $row['penyakit']; ?>
                          </td>
                          <td>
                            <?= $row['no_telepon']; ?>
                          </td>
                          <td>
                            <?= $row['jenis_asuransi']; ?>
                          </td>
                          <td>
                            <?= $row['no_asuransi']; ?>
                          </td>
                          <td style='vertical-align: middle;'>
                            <div style="display: flex; align-items: center; gap: 10px;">
                              <a href="m_ubah_pasien?id=<?= $row['id_pasien']; ?>">
                                <button type="button" class="btn btn-warning">Edit</button>
                              </a>
                              <button data-id_pasien="<?= $row['id_pasien']; ?>" type="button"
                                class="btn btn-danger delete">Hapus</button>
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
        e.preventDefault(); // Mencegah navigasi langsung ke URL href

        var id_pasien = $(this).data('id_pasien');
        var url = "proses/proses_pasien.php?id_pasien=" + id_pasien;

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
                    window.location.href = 'm_data_pasien.php';
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