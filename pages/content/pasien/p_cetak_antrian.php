<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="../../../assets/img/logo-SINIKA.png" type="image/x-icon" />

    <title>SINIKA - Sistem Informasi Klinik Aisha Medika</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="page-header fw-bold">
                        Informasi Antrian
                    </h2>
                    <address>
                        Klinik Aisha Medika</br>
                        Dusun Tamiang Sindang mulya
                        Kec. Kutawaluya Kab. Karawang
                    </address>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Atas Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Tanggal Antrian</th>
                                <th>Status Antrian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../../../backend/config/db-klinik.php");

                            if (isset($_GET['nomor_antrian'])) {
                                $nomor_antrian = $_GET['nomor_antrian'];

                                // Ambil informasi pasien dan dokter
                                $sqlInfoPasienDokter = "SELECT antrian.no_antrian, antrian.atas_nama_pasien, antrian.tanggal_antrian, antrian.status_antrian, dokter.nama_dokter, dokter.spesialisasi
                                FROM antrian
                                JOIN jadwal_dokter ON antrian.id_dokter = jadwal_dokter.id_dokter
                                JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter
                                WHERE antrian.no_antrian = ?";

                                $stmt = $db_connect->prepare($sqlInfoPasienDokter);
                                $stmt->bind_param("i", $nomor_antrian);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nomor_antrian = $row['no_antrian'];
                                    $atas_nama_pasien = $row['atas_nama_pasien'];
                                    $nama_dokter = $row['nama_dokter'];
                                    $spesialis = $row['spesialisasi'];
                                    $tglAntrian = $row['tanggal_antrian'];
                                    $stsAntrian = $row['status_antrian'];

                                    // Cetak informasi antrian ke dalam tabel
                                    echo "
                                    <tr>
                                        <td>$atas_nama_pasien</td>
                                        <td>$nama_dokter</td>
                                        <td>$spesialis</td>
                                        <td>$tglAntrian</td>
                                        <td>$stsAntrian</td>
                                    </tr>";
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada informasi antrian yang valid.</td></tr>";
                                }

                                $stmt->close();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", function () {
            window.print();
        });
    </script>
</body>

</html>