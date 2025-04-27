<?php
session_start();
require '../model/db.php';

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
        if ($user['status'] == 'Aktif') {
            $_SESSION['nama_pengguna'] = $user['nama_pengguna'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id_username'] = $user['id_username'];
            $_SESSION['login'] = true;
            header('Location: ../view/dashboard.php');
            exit();
        } else {
            header('Location: ../view/login.php?error=nonaktif');
            exit();
        }
    }
}

header('Location: ../view/login.php?error=1');
exit();
