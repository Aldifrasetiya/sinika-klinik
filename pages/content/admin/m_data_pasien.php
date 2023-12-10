<?php

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
          <h4 class="page-title">Data Pasien</h4>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $dataPasien = mysqli_query($db_connect, "SELECT * FROM pasien");

                      while ($row = mysqli_fetch_array($dataPasien)) {
                        ?>
                        <tr>
                          <td>
                            <?= $row['ID_Pasien']; ?>
                          </td>
                          <td>
                            <?= $row['Nama_Pasien']; ?>
                          </td>
                          <td>
                            <?= $row['Alamat']; ?>
                          </td>
                          <td>
                            <?= $row['tanggal_lahir']; ?>
                          </td>
                          <td>
                            <?= $row['jk']; ?>
                          </td>
                          <td>Penyakit</td>
                          <td>
                            <?= $row['Nomor_Telepon']; ?>
                          </td>
                          <td>
                            <?= $row['Jenis_Asuransi']; ?>
                          </td>
                          <td style='vertical-align: middle;'>
                            <a href='m_ubah_pasien?id=<?= $row['ID_Pasien']; ?>'>
                              <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                          </td>
                          <td style='vertical-align: middle;'><button type="button"
                              href='./../backend/proses_pasien.php?id_pasien=<?= $row['ID_Pasien']; ?>'
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
            window.location.href = url;
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
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>