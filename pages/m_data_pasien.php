<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");


?>

<body>
  <div class="main-panel">
    <div class="content">
      <div class="page-inner">
        <div class="page-header">
          <h4 class="page-title">Data Pasien</h4>
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
              <a href="#">Data Atrian</a>
            </li>
            <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <!-- <h4 class="card-title">Add Row</h4> -->
                </div>
                <a href="m_tambah_pasien.php" type="button" class="btn btn-primary">
                  <span class="btn-label">
                    <i class="fa-solid fa-user-plus"></i>
                  </span>
                  Tambah Pasien
                </a>
              </div>
              <div class="card-body">
                <table id="add-row" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID Pasien</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>JK</th>
                      <th>Penyakit</th>
                      <th>Jenis Asuransi</th>
                      <th style="width: 10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>PSN0001</td>
                      <td>Kevin Rinaldi</td>
                      <td>Citra Kebun Mas</td>
                      <td>20-Mar-1999</td>
                      <td>Laki-laki</td>
                      <td>Maag</td>
                      <td>BPJS</td>
                      <td>
                        <div class="form-button-action">
                          <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                            data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                            data-original-title="Remove">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
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

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>