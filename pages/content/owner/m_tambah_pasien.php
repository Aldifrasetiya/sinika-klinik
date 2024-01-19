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
                    <h4 class="page-title">Tambah Data Pasien</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../dashboard/d_owner">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_data_pasien.php">Data Pasien</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="m_tambah_pasien.php">Tambah Data Pasien</a>
                        </li>
                    </ul>
                </div>
                <form action="proses/proses_pasien.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="namePasien">Nama Pasien</label>
                                    <input type="text" class="form-control" name="namaPasien" id="namaPasien">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="ttl" id="ttl">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk">
                                        <option>--PILIH--</option>
                                        <option>LAKI-LAKI</option>
                                        <option>PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notlp">No telepon</label>
                                    <input type="text" class="form-control" name="notlp" id="notlp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="penyakit">Jenis Penyakit</label>
                                    <input type="text" class="form-control" name="penyakit" id="penyakit">
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
                                <button type="submit" name="TambahPasien" class="btn btn-success mx-2">Tambah</button>
                                <a class="btn btn-danger" href="m_data_pasien">Batal</a>
                            </div>
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
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>