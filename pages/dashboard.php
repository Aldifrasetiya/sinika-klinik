<?php

session_start();

if ($_SESSION['role'] != 'admin') {
  session_destroy();
  header('Location:./../index.php');
  exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");



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
              <h2 class="text-white pb-2 fw-bold">Selamat datang Administrator</h2>
              <!-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> -->
            </div>
          </div>
        </div>
      </div>
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
                      <h4 class="card-title">20</h4>
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
                      <h4 class="card-title">2</h4>
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
                      <h4 class="card-title">50</h4>
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

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>