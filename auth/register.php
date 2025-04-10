<?php
session_start();
include '../koneksi.php'; // Pastikan koneksi terhubung

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama_pengguna']) ? htmlspecialchars($_POST['nama_pengguna']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
    $role = "user"; // Default role

    // Validasi input kosong
    if (empty($nama) || empty($email) || empty($_POST['password'])) {
        $_SESSION['error'] = "Semua kolom wajib diisi!";
        header("Location: register.php");
        exit();
    }

    // Cek apakah email sudah ada
    $cek_email = $conn->prepare("SELECT * FROM pengguna WHERE email = ?");
    $cek_email->bind_param("s", $email);
    $cek_email->execute();
    $result = $cek_email->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email sudah digunakan!";
        header("Location: register.php");
        exit();
    }

    // Masukkan ke database
    $stmt = $conn->prepare("INSERT INTO pengguna (nama_pengguna, email, kata_sandi, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $password, $level);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan, coba lagi!";
        header("Location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="../output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-center">
    <img src="../image/logo.png" alt="Logo" class="w-24 mx-auto mb-6">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Register</h2>
    <p class="text-gray-500 mb-6">Masuk untuk melanjutkan</p>

    <!-- Menampilkan Pesan Error -->
    <?php if (isset($_SESSION['error'])): ?>
        <p class="text-red-500 text-sm mb-4"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form action="process_login.php" method="POST">
        <div class="mb-4 text-left">
            <label class="block text-gray-700 font-semibold">Nama</label>
            <input type="text" name="nama_pengguna" class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-4 text-left">
            <label class="block text-gray-700 font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan email" required>
        </div>

        <div class="mb-4 text-left">
            <label class="block text-gray-700 font-semibold">Password</label>
            <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password" required>
        </div>

        <button class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
            Daftar
        </button>
    </form>

    <p class="mt-4 text-gray-600">Sudah punya akun? <a href="login.php" class="text-blue-500 font-semibold">login</a></p>
</div>

</body>
</html>