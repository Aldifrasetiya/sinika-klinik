<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Halaman Registrasi</title>
</head>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img width="350" height="150" src="assets/img/logo-SINIKA.png" alt="">
                        <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                            <p class="text-center small">Masukkan detail pribadi Anda untuk membuat akun</p>
                        </div>

                        <form action="./backend/register.php" method="post" class="row g-3 needs-validation">

                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                    <input type="text" name="username" class="form-control" id="yourUsername" required>
                                    <div class="invalid-feedback">Harap isi username yang sesuai.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Alamat Email</label>
                                <input type="email" name="email" class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Harap Masukkan Email Anda!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">Harap Masukkan password!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password2" class="form-control" id="yourPassword2"
                                    required>
                                <div class="invalid-feedback">Harap Masukkan password!</div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value=""
                                        id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">Saya setuju dan menerima <a
                                            href="#">syarat dan
                                            ketentuan</a></label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="./pages/dashboard.php" class="btn btn-primary w-100" type="submit"
                                    name="register">Buat
                                    Akun</a>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Sudah punya akun? <a href="index.php">Log in</a></p>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="credits">
                    Copyright by <a href="https://bootstrapmade.com/">UBP Team 😎</a>
                </div>

            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</html>