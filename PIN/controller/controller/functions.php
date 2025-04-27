<?php
session_start();
require '../model/db.php';

function ubah_data_user($id_username, $password_lama, $password_baru, $konfirmasi_password_baru, $username_baru, $nama_pengguna_baru, $email_baru, $foto_profile, $status_baru)
{
    global $conn;

    // Ambil data lama dari database
    $sql = "SELECT * FROM user WHERE id_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_lama = $result->fetch_assoc();

    if (!$user_lama) {
        return "User tidak ditemukan.";
    }

    // Siapkan data baru, fallback ke data lama kalau kosong
    $username = !empty($username_baru) ? $username_baru : $user_lama['username'];
    $nama_pengguna = !empty($nama_pengguna_baru) ? $nama_pengguna_baru : $user_lama['nama_pengguna'];
    $email = !empty($email_baru) ? $email_baru : $user_lama['email'];
    $status = !empty($status_baru) ? $status_baru : 'aktif';

    // Cek apakah mau ganti password
    if (!empty($password_baru)) {
        // Wajib cek password lama
        if (!password_verify($password_lama, $user_lama['password'])) {
            return "Password lama tidak sesuai.";
        }

        if ($password_baru !== $konfirmasi_password_baru) {
            return "Password baru dan konfirmasi password tidak cocok.";
        }

        // Hash password baru
        $password = password_hash($password_baru, PASSWORD_DEFAULT);
    } else {
        $password = $user_lama['password']; // Pakai password lama
    }

    // Upload foto profile
    $foto_profile_nama = isset($user_lama['foto_profile']) ? $user_lama['foto_profile'] : ''; // Pastikan ada

    if ($foto_profile && $foto_profile['name']) {
        $allowed_types = ['jpg', 'jpeg', 'png'];
        $file_name = $foto_profile['name'];
        $file_tmp = $foto_profile['tmp_name'];
        $file_size = $foto_profile['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed_types)) {
            if ($file_size <= 2 * 1024 * 1024) { // maksimal 2MB
                $new_file_name = uniqid('profile_', true) . '.' . $file_ext;
                $upload_path = __DIR__ . '/../uploads/' . $new_file_name;
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Hapus foto lama kalau ada
                    if (!empty($user_lama['foto_profile']) && file_exists("../uploads/" . $user_lama['foto_profile'])) {
                        unlink("../uploads/" . $user_lama['foto_profile']);
                    }
                    $foto_profile_nama = $new_file_name;
                } else {
                    return "Gagal upload foto.";
                }
            } else {
                return "Ukuran foto terlalu besar (maksimal 2MB).";
            }
        } else {
            return "Format file harus JPG, JPEG, atau PNG.";
        }
    }

    // Update ke database
    $sql_update = "UPDATE user SET username = ?, nama_pengguna = ?, email = ?, status = ?, password = ?, foto_profile = ? WHERE id_username = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('ssssssi', $username, $nama_pengguna, $email, $status, $password, $foto_profile_nama, $id_username);

    if ($stmt_update->execute()) {
        // Kalau update berhasil, update session juga
        $_SESSION['username'] = $username;
        $_SESSION['nama_pengguna'] = $nama_pengguna;
        $_SESSION['email'] = $email;
        $_SESSION['status'] = $status;
        $_SESSION['foto_profile'] = $foto_profile_nama;

        return "Data berhasil diubah.";
    } else {
        return "Gagal mengubah data: " . $stmt_update->error;
    }
}

function proses_ubah_data()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        global $conn;

        $id_username = $_SESSION['id_username'];
        $password_lama = $_POST['password_lama'] ?? '';
        $password_baru = $_POST['password_baru'] ?? '';
        $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'] ?? '';
        $username_baru = $_POST['username'] ?? '';
        $nama_pengguna_baru = $_POST['nama_pengguna'] ?? '';
        $email_baru = $_POST['email'] ?? '';
        $status_baru = $_POST['status'] ?? '';
        $foto_profile = $_FILES['foto_profile'] ?? null;

        return ubah_data_user($id_username, $password_lama, $password_baru, $konfirmasi_password_baru, $username_baru, $nama_pengguna_baru, $email_baru, $foto_profile, $status_baru);
    }
}

function ambil_data()
{
    global $conn;
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $user_data = $result->fetch_assoc();

    $stmt->close();

    return $user_data;
}

// Load data user
$user_data = ambil_data();

// kirim ke view
include '../view/profile.php';
