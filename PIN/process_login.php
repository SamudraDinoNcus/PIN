<?php
session_start();
require 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        if ($user['status'] == 'aktif') {
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama_pengguna'] = $user['nama_pengguna'];
            header('Location: dashboard.php');
            exit();
        } else {
            header('Location: login.php?error=nonaktif');
            exit();
        }
    }
}

header('Location: login.php?error=1');
exit();
