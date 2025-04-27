<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
  // Jika belum login, arahkan ke login.php
  header('Location: ../view/login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../assets/style.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico">

  <!-- Theme Config Js -->
  <script src="../assets/js/config.js"></script>

  <!-- App css -->
  <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

  <!-- Icons css -->
  <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php
  include "../layouts/navbar.php"
  ?>
  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#demo"
        data-bs-slide-to="0"
        class="active"></button>
      <button
        type="button"
        data-bs-target="#demo"
        data-bs-slide-to="1"></button>
      <button
        type="button"
        data-bs-target="#demo"
        data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img
          src="../assets/pic1.jpg"
          alt="Los Angeles"
          class="d-block w-100"
          width="200px" />
      </div>
      <div class="carousel-caption">
        <h3>Daizy</h3>
        <p>Penjualan Bermacam-macam jenis Tanaman</p>
      </div>
      <div class="carousel-item">
        <img
          src="../assets/pic2.jpg"
          alt="Chicago"
          class="d-block w-100"
          width="100px" />
      </div>
      <div class="carousel-caption">
        <h3>Daizy</h3>
        <p>Penjualan Bermacam-macam jenis Tanaman</p>
      </div>
      <div class="carousel-item">
        <img
          src="../assets/pic3.jpg"
          alt="New York"
          class="d-block w-100"
          width="20px" />
      </div>
      <div class="carousel-caption">
        <h3>Daizy</h3>
        <p>Penjualan Bermacam-macam jenis Tanaman</p>
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#demo"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#demo"
      data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- container -->
  <div class="container p-5 my-5 bg-dark text-white">
    <h1>Discount 50% for summer</h1>
    <p>Happy Christmas 2023</p>
  </div>

  <section id="saller" class="saller section-padding mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>6 Best Saller</h2>
            <p>Beberapa tanaman yang laris diminggu ini</p>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-light pb-2">
              <div class="card-body text-dark">
                <div class="img-area mb-4">
                  <img
                    src="../assets/img1.jpg"
                    alt=""
                    class="img-fluid"
                    style="height: 250px" />
                </div>
                <h3 class="card-title">Variegasi</h3>
                <p>Rp.30.000</p>
                <div class="btn">lihat selengkapnya</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-light pb-2">
              <div class="card-body text-dark">
                <div class="img-area mb-4">
                  <img
                    src="../assets/img2.jpg"
                    alt=""
                    class="img-fluid"
                    style="height: 250px" />
                </div>
                <h3 class="card-title">Warna keemasan</h3>
                <p>Rp.30.000</p>
                <div class="btn">lihat selengkapnya</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-light pb-2">
              <div class="card-body text-dark">
                <div class="img-area mb-4">
                  <img
                    src="../assets/img3.jpg"
                    alt=""
                    class="img-fluid"
                    style="height: 250px" />
                </div>
                <h3 class="card-title">Hoya</h3>
                <p>Rp.40.000</p>
                <div class="btn">lihat selengkapnya</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 mt-5">
            <div class="card text-white text-center bg-light pb-2">
              <div class="card-body text-dark">
                <div class="img-area mb-4">
                  <img
                    src="../assets/img4.jpg"
                    alt=""
                    class="img-fluid"
                    style="height: 250px" />
                </div>
                <h3 class="card-title">Forgiving plants</h3>
                <p>Rp.35.000</p>
                <div class="btn">lihat selengkapnya</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 mt-5">
            <div class="card text-white text-center bg-light pb-2">
              <div class="card-body text-dark">
                <div class="img-area mb-4">
                  <img
                    src="../assets/img5.jpg"
                    alt=""
                    class="img-fluid"
                    style="height: 250px" />
                </div>
                <h3 class="card-title">White bird of paradise</h3>
                <p>Rp.70.000</p>
                <div class="btn">lihat selengkapnya</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 mt-5">
            <div class="card text-white text-center bg-light pb-2">
              <div class="card-body text-dark">
                <div class="img-area mb-4">
                  <img
                    src="../assets/img6.jpg"
                    alt=""
                    class="img-fluid"
                    style="height: 250px" />
                </div>
                <h3 class="card-title">Tanaman organik dan lokal</h3>
                <p>Rp.30.000</p>
                <div class="btn">lihat selengkapnya</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="container-footer">
    <footer class="bg-dark text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"><i class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"><i class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"><i class="fab fa-linkedin-in"></i></a>

          <!-- Github -->
          <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"><i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  </div>
  <!-- End of .container -->
</body>

</html>