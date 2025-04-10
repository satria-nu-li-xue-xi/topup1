<?php
include 'koneksi.php'; // Pastikan koneksi sudah benar

// Ambil game_id dari URL, pastikan bertipe integer
$game_id = isset($_GET['game']) ? intval($_GET['game']) : 0;

if ($game_id <= 0) {
    echo "<h1 class='text-center text-red-600 text-2xl mt-10'>Game tidak ditemukan.</h1>";
    exit;
}

// Ambil informasi game berdasarkan game_id
$query = "SELECT id, nama, gambar, deskripsi FROM permainan WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $game_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$game = mysqli_fetch_assoc($result);

// Jika game tidak ditemukan, tampilkan pesan
if (!$game) {
    echo "<h1 class='text-center text-red-600 text-2xl mt-10'>Game tidak ditemukan.</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan - <?= htmlspecialchars($game['nama'] ?? 'Tidak Diketahui') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full bg-white rounded-lg shadow-lg p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Gambar & Info Game -->
        <div class="flex flex-col items-center text-center space-y-4">
            <img src="<?= !empty($game['gambar']) ? 'dashboard/image/' . htmlspecialchars($game['gambar']) : 'image/default.png' ?>" 
            alt="<?= htmlspecialchars($game['nama'] ?? 'Tidak Diketahui') ?>" 
            class="w-48 h-48 object-cover rounded-lg shadow-md">

            <h1 class="text-2xl font-semibold"><?= htmlspecialchars($game['nama'] ?? 'Tidak Diketahui') ?></h1>
            <p class="text-gray-600"><?= htmlspecialchars($game['deskripsi'] ?? 'Deskripsi tidak tersedia') ?></p>
        </div>

        <!-- Form Pemesanan -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Formulir Pemesanan</h2>
            <form action="pemesanan.php" method="post" class="space-y-4">
                <input type="hidden" name="game_id" value="<?= htmlspecialchars($game_id) ?>">

                <!-- Input User ID -->
                <div>
                    <label class="block text-gray-700">Masukkan ID Pengguna:</label>
                    <input type="text" name="user_id" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Pilihan Jumlah Diamond -->
                <div>
                    <label class="block text-gray-700">Jumlah Diamond:</label>
                    <select name="diamond" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <?php
                        for ($i = 50; $i <= 1000; $i += 50) {
                            echo "<option value='$i'>$i Diamond</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Tombol Pesan -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                        Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
