<?php session_start();

// Cek apakah user sudah login
if (isset($_SESSION['login'])) {
    // Jika belum login, arahkan ke login.php
    header('Location: dashboard.php');
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
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">DAIZY</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search" />
          <button class="btn btn-primary" type="button">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <br /><br /><br /><br />
    <h2 class="ms-5">Login Customer</h2>
    <br />

    <?php if (isset($_GET['error'])): ?>
      <p style="color:red;">
        <?php
        if ($_GET['error'] == '1') echo "Username atau password salah!";
        elseif ($_GET['error'] == 'nonaktif') echo "Akun nonaktif!";
        ?>
      </p>
    <?php endif; ?>

    <div class="row">
      <div class="col-4">
        <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">
          <form method="POST" action="../controller/process_login.php">
            <!-- Update this action -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                required />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required />
            </div>
              <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
      <div class="col-8">
        <div class="card mb-3" style="max-width: 800px">
          <div class="row g-0">
            <div class="col-md-4">
              <img
                src="../assets/foto3.jpg"
                class="img-fluid rounded-start"
                alt="..." />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Little Mask</h5>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Molestiae illo perspiciatis cum necessitatibus neque magnam
                  aliquid tenetur harum sapiente ipsa. Quo eum provident ullam
                  illum? Assumenda non voluptate incidunt id!
                </p>
                <p class="card-text">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"
    integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</body>

</html>