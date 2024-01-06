<?php

session_start();

if ($_SESSION['role'] != 'owner') {
  // session_destroy();
  header('Location: login.php');
  exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}h_owner.php");



?>
<!-- Fonts and icons -->
<!-- <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
<script>
  WebFont.load({
    google: { "families": ["Lato:300,400,700,900"] },
    custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css'] },
    active: function () {
      sessionStorage.fonts = true;
    }
  });
</script> -->

<!-- CSS Files -->
<!-- <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/atlantis.min.css"> -->
<!-- CSS Just for demo purpose, don't include it in your project -->
<!-- <link rel="stylesheet" href="../../assets/css/demo.css"> -->

<body>
  <div class="main-panel">
    <div class="content">
      <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
              <h2 class="text-white pb-2 fw-bold">Selamat datang Owner</h2>
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

      // data Realtime dokter
      $dataRealtimeDokter = mysqli_query($db_connect, "SELECT count(id_dokter) AS jmlh_dokter FROM jadwal_dokter");
      $viewDokter = mysqli_fetch_array($dataRealtimeDokter);

      // data Realtime pasien
      $dataRealtimePasien = mysqli_query($db_connect, "SELECT count(id_pasien) AS jmlh_pasien FROM pasien");
      $viewPasien = mysqli_fetch_array($dataRealtimePasien);

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
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                  <div class="col-7 col-stats">
                    <div class="numbers">
                      <p class="card-category">Pasien</p>
                      <h4 class="card-title">
                        <?php echo $viewPasien['jmlh_pasien']; ?>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Custom template | don't include it in your project! -->
</body>