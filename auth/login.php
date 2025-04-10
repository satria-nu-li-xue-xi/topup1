<?php
session_start();


// Periksa apakah pengguna sudah login dengan level yang valid
if (isset($_SESSION['user_logged_in']) && isset($_SESSION['level'])) {
    header("Location: " . ($_SESSION['level'] == "admin" ? "dashboard/admin/dashboard.php" : "index.php"));
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;900&family=Poppins:wght@100;900&display=swap" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-center">
        <img src="../image/logo.png" alt="Logo" class="w-24 mx-auto mb-6">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Login!</h2>
        <p class="text-gray-500 mb-6">Masuk untuk melanjutkan</p>

        <!-- Menampilkan Pesan Error -->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="text-red-500 text-sm mb-4"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="process_login.php" method="POST">
            <div class="mb-4 text-left">
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan email" required>
            </div>

            <div class="mb-4 text-left">
                <label class="block text-gray-700 font-semibold">Password</label>
                <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password" required>
            </div>

            <button class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                Login
            </button>
        </form>

        <p class="mt-4 text-gray-600">Belum punya akun? <a href="register.php" class="text-blue-500 font-semibold">Daftar</a></p>
    </div>

</body>
</html>
