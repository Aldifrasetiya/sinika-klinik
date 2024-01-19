<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds) . $ds;
require_once("{$base_dir}core{$ds}h_pasien.php");

?>

<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang di SINIKA</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Sistem Informasi Klinik Aisha Medika
          </h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="pages/content/pasien/p_pendaftaran"
                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar Antrian Disini!</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="pages/assets/img/hero-SINIKA.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <?php

    include('backend/config/db-klinik.php');

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
    <!-- ======= Data Realtime Section ======= -->
    <section id="counts" class="counts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Informasi</h2>
          <p>Data Realtime</p>
        </header>
        <div class="row gy-4 justify-content-center">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-users"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $viewAntrian['jmlh_antrian']; ?>"
                  data-purecounter-duration="1" class="purecounter"></span>
                <p>Antrian</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fa-solid fa-stethoscope" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $viewDokter['jmlh_dokter']; ?>"
                  data-purecounter-duration="1" class="purecounter"></span>
                <p>Dokter</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $viewPasien['jmlh_pasien']; ?>"
                  data-purecounter-duration="1" class="purecounter"></span>
                <p>Pasien</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End Data Realtime Section -->

    <!-- ======= Jadwal Dokter Section ======= -->
    <section id="counts" class="counts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Informasi</h2>
          <p>Jadwal Praktek Dokter</p>
        </header>
        <div class="row gy-4 justify-content-center">

          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-bordered border-primary">
                  <thead class="table-primary">
                    <tr>
                      <th>NO</th>
                      <th>ID Dokter</th>
                      <th>Nama</th>
                      <th>Spesialis</th>
                      <th>No Telepon</th>
                      <th>Hari Praktek</th>
                      <th>Jam Mulai Praktek</th>
                      <th>Jam Selesai Praktek</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php

                      $jadwalDokter = mysqli_query($db_connect, "SELECT jadwal_dokter.*, dokter.nama_dokter, dokter.spesialisasi, dokter.notlp_dokter
                      FROM jadwal_dokter
                      INNER JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter");
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
                          <?= $row['spesialisasi']; ?>
                        </td>
                        <td>
                          <?= $row['notlp_dokter']; ?>
                        </td>
                        <td>
                          <?= $row['hari_praktek']; ?>
                        </td>
                        <td>
                          <?= $row['jam_mulai_praktek']; ?>
                        </td>
                        <td>
                          <?= $row['jam_selesai_praktek']; ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- End Jadwal Dokter Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index" class="logo d-flex align-items-center">
              <img width="160" height="90" src="assets/img/logo-SINIKA.png" alt="logo-SINIKA">
            </a>
            <p class="fw-bold">SINIKA - Sistem Informasi Klinik Aisha Medika</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Dashboard</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="pages/content/pasien/p_pendaftaran">Pendaftaran</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-6 footer-links">
            <h4>Address</h4>
            <p>
              Klinik Aisha Medika<br>
              Dusun Tamiang desa Tamiang desa Sindang mulya<br>
              Kec. Kutawaluya<br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">


          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="pages/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="pages/assets/vendor/aos/aos.js"></script>
  <script src="pages/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="pages/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="pages/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="pages/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="pages/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="pages/assets/js/main.js"></script>
  <script src="pages/assets/js/main.js"></script>
</body>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>