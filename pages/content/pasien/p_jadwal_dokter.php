<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}h_pasien.php");


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
              <a href="#">Jadwal Dokter</a>
            </li>
            <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
          </ul>
        </div>
        <div class="card">
          <div class="d-flex">
            <div class="form-group">
              <label for="smallSelect">Hari</label>
              <select class="form-control form-control-sm" id="smallSelect">
                <option>--PILIH--</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="smallSelect">Spesialis</label>
              <select class="form-control form-control-sm" id="smallSelect">
                <option>--PILIH--</option>
                <option>Dokter Umum Gigi</option>
                <option>Dokter Umum Anak</option>
              </select>
            </div>
            <a type="button" class="btn btn-primary my-4 text-white">Lihat Jadwal</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>