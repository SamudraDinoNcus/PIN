<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke login.php
    header('Location: login.php');
    exit();
}

session_destroy();
header('Location: login.php');
exit();
