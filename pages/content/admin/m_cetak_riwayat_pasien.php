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
                        Laporan Riwayat Pasien
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
                                <th>ID Riwayat Pasien</th>
                                <th>ID Pasien</th>
                                <th>Tanggal</th>
                                <th>Jenis Pelayanan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../../../backend/config/db-klinik.php");

                            if (isset($_GET['id_riwayat'])) {
                                $id_riwayat = $_GET['id_riwayat'];

                                // Ambil informasi pasien dan dokter
                                $sqlInfoRiwayat = "SELECT * FROM riwayat_pasien WHERE id_riwayat = ?";

                                $stmt = $db_connect->prepare($sqlInfoRiwayat);
                                $stmt->bind_param("i", $id_riwayat);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $id_riwayat = $row['id_riwayat'];
                                    $id_pasien = $row['id_pasien'];
                                    $tgl = $row['tanggal'];
                                    $jp = $row['jenis_pelayanan'];
                                    $ket = $row['keterangan'];

                                    // Cetak informasi riwayat pasien ke dalam tabel
                                    echo "
                                    <tr>
                                        <td>$id_riwayat</td>
                                        <td>$id_pasien</td>
                                        <td>$tgl</td>
                                        <td>$jp</td>
                                        <td>$ket</td>
                                    </tr>";
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada informasi yang valid.</td></tr>";
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