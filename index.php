<?php
session_start();
include 'koneksi.php'; // Hubungkan ke database

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: auth/login.php");
    exit();
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-poppins">

<!-- Navbar -->
<nav class="flex items-center justify-between px-8 py-4 shadow-sm">
  <div class="flex items-center space-x-4">
    <input type="text" placeholder="Search games..." class="w-80 px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" />
    <img src="image/logo.png" alt="Logo" class="h-10 w-auto">
  </div>
  <form action="auth/logout.php" method="post">
    <button class="px-5 py-2 bg-red-200 text-red-800 rounded-full hover:bg-red-300" type="submit">Logout</button>
  </form>
</nav>

<section class="bg-gray-500 w-full text-white py-20 px-6 text-center">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Beli Voucher mu disini!</h1>
    <p class="text-lg md:text-xl mb-8">Jelajahi berbagai pilihan game seru, mulai dari game aksi, petualangan, hingga strategi. Semua lengkap untukmu!</p>
    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300">Lihat Semua Game</a>
  </div>
</section>

<div class="flex">
  <!-- Sidebar -->
  <aside class="w-20 flex flex-col items-center space-y-10 py-10">
    <a href="index.php" class="flex flex-col items-center space-y-1">
      <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="w-6 h-6">
      <span class="text-sm">Home</span>
    </a>
    <a href="promo.php" class="flex flex-col items-center space-y-1">
      <img src="https://img.icons8.com/ios-filled/50/000000/sale.png" class="w-6 h-6">
      <span class="text-sm">Promo</span>
    </a>
    <a href="hadiah.php" class="flex flex-col items-center space-y-1">
      <img src="https://img.icons8.com/ios-filled/50/000000/gift.png" class="w-6 h-6">
      <span class="text-sm">Hadiah</span>
    </a>
    <a href="keranjang.php" class="flex flex-col items-center space-y-1">
      <img src="https://img.icons8.com/ios-filled/50/000000/shopping-cart.png" class="w-6 h-6">
      <span class="text-sm">Pesanan</span>
    </a>
  </aside>

  <!-- Game List -->
  <main class="p-10 w-full">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
      <?php
      // Ambil daftar game dari database
      $query = "SELECT * FROM permainan";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              $name = $row['nama'];
              $img = "dashboard/image/" . $row['gambar']; // Sesuaikan dengan lokasi gambar di server
              $url = "pesanan.php?game=" . urlencode($id);

              echo "
              <div class='text-center space-y-2'>
                <a href='$url'>
                  <img src='$img' alt='$name' class='w-full h-40 object-cover rounded-xl shadow-lg'>
                  <p class='text-gray-700 font-semibold mt-2'>$name</p>
                </a>
              </div>";
          }
      } else {
          echo "<p class='text-gray-700 text-center'>Belum ada game yang tersedia.</p>";
      }
      ?>
    </div>
  </main>
</div>

<script src="./node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
