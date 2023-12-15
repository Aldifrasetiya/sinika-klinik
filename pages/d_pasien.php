<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}h_pasien.php");
require_once("{$base_dir}backend{$ds}proses_jadwal_dokter.php");

?>

<body>
  <div class="main-panel">
    <div class="content">
      <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
              <h2 class="text-white pb-2 fw-bold">Selamat Datang di SINIKA</h2>
              <!-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> -->
            </div>
          </div>
        </div>
      </div>
      <?php

      include('../backend/config/db-klinik.php');

      // data Realtime antrian
      $dataRealtimeAntrian = mysqli_query($db_connect, "SELECT count(no_antrian) AS jmlh_antrian FROM antrian");
      $viewAntrian = mysqli_fetch_array($dataRealtimeAntrian);

      // data Realtime antrian
      $dataRealtimeDokter = mysqli_query($db_connect, "SELECT count(id_dokter) AS jmlh_dokter FROM jadwal_dokter");
      $viewDokter = mysqli_fetch_array($dataRealtimeDokter);

      ?>
      <div class="page-inner mt--5">
        <div class="row mt--2">
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-5">
                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                  <div class="col-7 col-stats">
                    <div class="numbers">
                      <p class="card-category">Antrian</p>
                      <h4 class="card-title">
                        <?php echo $viewAntrian['jmlh_antrian']; ?>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                      <i class="fa-solid fa-stethoscope"></i>
                    </div>
                  </div>
                  <div class="col-7 col-stats">
                    <div class="numbers">
                      <p class="card-category">Dokter</p>
                      <h4 class="card-title">
                        <?php echo $viewDokter['jmlh_dokter']; ?>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title fw-bold">Jadwal Dokter</div>
          </div>
          <div class="card-body">
            <table class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID Dokter</th>
                  <th>Nama</th>
                  <th>Spesialis</th>
                  <th>No Telepon</th>
                  <th>Hari Praktek</th>
                  <th>Jam Praktek</th>
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
                  </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>