<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <link rel="icon" href="../assets/img/logo-SINIKA.png" type="image/x-icon" />
  <!-- <link rel="stylesheet" href="style.css"> -->
  <title>SINIKA - Sistem Informasi Klinik Aisha Medika</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img width="350" height="150" src="../assets/img/logo-SINIKA.png" alt="logo">
            <!-- <span class="d-none d-lg-block">SIKAM</span> -->
          </a>
        </div><!-- End Logo -->

        <div class="card border-0 shadow rounded-3 mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login</h5>
            </div>

            <form action="../backend/login.php" method="POST" class="row g-3 needs-validation">

              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="email" id="email" placeholder="email">
                  <label>Email</label>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="password">
                  <label>Password</label>
                </div>
              </div>


              <div class="col-12">
                <!-- <button class="btn btn-primary w-100" type="submit">Login</button> -->
                <input class="btn btn-primary w-100" type="submit" value="Login" name="login"></input>
              </div>
            </form>
            <div class="d-flex justify-content-center">
              <a href="../d_pasien" class="btn btn-warning w-100 my-3 text-white">Homepage</a>
            </div>
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
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>