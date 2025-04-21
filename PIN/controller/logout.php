<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan ke login.php
    header('Location: ../view/login.php');
    exit();
}

session_destroy();
header('Location: ../view/login.php');
exit();
