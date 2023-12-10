<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}content{$ds}core{$ds}h_pasien.php");
// require_once("{$base_dir}backend{$ds}proses_antrian_pasien.php");

?>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Pendaftaran</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="d_pasien.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="p_pendaftaran">Pendaftaran</a>
                        </li>
                        <!-- <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Dokter Umum</a>
                        </li> -->
                    </ul>
                </div>
                <form action="../../../backend/proses_antrian_pasien.php" method="POST">
                    <div class=" row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        aria-describedby="nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notlp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" name="noTlp" id="notlp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="asuransi">Asuransi</label>
                                    <select class="form-control" name="asuransi" id="asuransi">
                                        <option>--PILIH--</option>
                                        <option>BPJS</option>
                                        <option>Non BPJS</option>
                                        <option>Asuransi lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" id="noBpjsInput" style="display: none;">
                                    <label for="noAsuransi" class="form-label">Masukkan No Asuransi</label>
                                    <input type="text" class="form-control" name="noAsuransi" id="noAsuransi">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="DaftarAntrian" class="btn btn-success">Daftar</button>
                            </div>
                        </div>
                        <script>
                            document.getElementById("asuransi").addEventListener("change", function () {
                                const selectedOption = this.value;
                                const noBpjsInput = document.getElementById("noBpjsInput");

                                if (selectedOption === "BPJS" || selectedOption === "Asuransi lainnya") {
                                    noBpjsInput.style.display = "block";
                                } else {
                                    noBpjsInput.style.display = "none";
                                }
                            });
                        </script>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>