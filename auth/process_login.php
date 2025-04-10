<?php
session_start();
include '../koneksi.php'; // Pastikan path benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email dan password harus diisi!";
        header("Location: login.php");
        exit();
    }

    // Cek data pengguna di database
    $query = "SELECT * FROM pengguna WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['error'] = "Terjadi kesalahan sistem!";
        header("Location: login.php");
        exit();
    }

    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['kata_sandi'])) { // Perbaikan disini
        // Set sesi jika login berhasil
        $_SESSION['user_logged_in'] = true;
        $_SESSION['nama'] = $user['nama_pengguna']; // Menyimpan nama pengguna

        // Periksa apakah level tersedia
        if (isset($user['level'])) {
            $_SESSION['level'] = $user['level'];

            // Redirect berdasarkan level
            header("Location: " . ($user['level'] == "admin" ? "../dashboard/admin/dashboard.php" : "../index.php"));
        } else {
            header("Location: ../index.php"); // Default redirect jika level tidak ada
        }
        exit();
    }

    // Jika login gagal
    $_SESSION['error'] = "Email atau password salah!";
    header("Location: login.php");
    exit();
}
?>
