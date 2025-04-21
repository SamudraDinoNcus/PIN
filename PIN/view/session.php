<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan ke login.php
    header('Location: login.php');
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
    <?php $username = $_SESSION['nama_pengguna']; ?>
    <h1>Selamat Datang <?php echo "$username" ?> di halaman utama</h1>

    <a href="../controller/logout.php">
        <button>Logout</button>
    </a>
</body>