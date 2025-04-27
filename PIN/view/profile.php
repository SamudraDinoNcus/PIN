<?php
// Cek kalau user belum login
if (!isset($_SESSION['login'])) {
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
    <link rel="stylesheet" href="PIN/assets/style.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
        crossorigin="anonymous" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="../assets/js/config.js"></script>

    <!-- App css -->
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php
    include "../layouts/navbar.php"
    ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="container text-center">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col">
            </div>
            <div class="col-10">
                <div class="card text-center">
                    <div class="card-body">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $hasil = proses_ubah_data();
                            if ($hasil === "Data berhasil diubah.") {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: '$hasil',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        }).then(function() {
                                            window.location.href = '../controller/functions.php'; // reload halaman setelah klik OK
                                        });
                                    </script>";
                            } else {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: '$hasil',
                                            confirmButtonColor: '#d33',
                                            confirmButtonText: 'Coba Lagi'
                                        });
                                    </script>";
                            }
                        }
                        ?>


                        <div class="col-xl-2 container">
                            <img src="../assets/black.jpg" class="rounded-circle avatar-lg img-thumbnail "
                                alt="profile-image">
                        </div>

                        <h4 class="mb-1 mt-2"><?php echo $_SESSION['nama_pengguna']; ?></h4>
                        <p class="text-muted">Admin</p>

                        <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Edit</button>

                        <div class="text-start mt-3">
                            <h4 class="fs-13 text-uppercase">About Me :</h4>
                            <p class="text-muted mb-3">
                                Hi I'm Michael Berndt,has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type.
                            </p>
                            <p class="text-muted mb-2"><strong>Full Name :</strong> <span class="ms-2"><?php echo $_SESSION['nama_pengguna']; ?></span></p>

                            <p class="text-muted mb-2"><strong>Status User :</strong><span class="ms-2"><?php echo $_SESSION['username']; ?></span></p>

                            <p class="text-muted mb-2"><strong>Status :</strong> <span class="ms-2 "><?= $user_data['status']; ?></span></p>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="ri-facebook-circle-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="ri-google-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="ri-twitter-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="ri-github-fill"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
            <div class="col">
            </div>
        </div>
    </div>

    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="card overflow-hidden">
                            <div class="card-body">

                                <h4 class="header-title mb-3"> Basic Wizard</h4>

                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_username" value="<?= $_SESSION['id_username']; ?>">
                                    <div id="basicwizard">

                                        <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                            <li class="nav-item">
                                                <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                    <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Account</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                    <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                    <i class="ri-check-double-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Finish</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content b-0 mb-0">
                                            <div class="tab-pane" id="basictab1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="userName">User name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="userName" name="username" value="<?= htmlspecialchars($user_data['username']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="password_lama">Old Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="password_lama" name="password_lama" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="password_baru">New Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="password_baru" name="password_baru" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="confirm">Re Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="confirm" name="konfirmasi_password_baru" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-end">
                                                        <a href="javascript:void(0);" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-pane" id="basictab2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="name"> Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name" name="nama_pengguna" class="form-control" value="<?= htmlspecialchars($user_data['nama_pengguna']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="surname"> About you</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="surname" name="surname" class="form-control" value="<?= htmlspecialchars($user_data['nama_pengguna']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="email"> Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user_data['email']) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="foto_profile">Foto Profile</label>
                                                            <div class="col-md-9">
                                                                <input type="file" id="foto_profile" name="foto_profile" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <ul class="pager wizard mb-0 list-inline">
                                                    <li class="previous list-inline-item">
                                                        <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                    </li>
                                                    <li class="next list-inline-item float-end">
                                                        <button type="button" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-pane" id="basictab3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <h2 class="mt-0"><i class="ri-check-double-line"></i></h2>
                                                            <h3 class="mt-0">Thank you !</h3>

                                                            <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                mattis dictum aliquet.</p>

                                                            <div class="mb-3">
                                                                <div class="form-check d-inline-block">
                                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                    <label class="form-check-label" for="customCheck1">I agree with the Terms and Conditions</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <ul class="pager wizard mb-0 list-inline mt-1">
                                                    <li class="previous list-inline-item">
                                                        <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Profile</button>
                                                    </li>
                                                    <li class="next list-inline-item float-end">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div> <!-- tab-content -->
                                    </div> <!-- end #basicwizard-->
                                </form>

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- Bootstrap Wizard Form js -->
    <script src="../assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- Wizard Form Demo js -->
    <script src="../assets/js/pages/demo.form-wizard.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>