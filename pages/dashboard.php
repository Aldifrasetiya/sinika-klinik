<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
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
            <div class="ml-md-auto py-2 py-md-0">
              <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
              <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
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