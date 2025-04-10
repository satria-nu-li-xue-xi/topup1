<?php
include '../../koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM permainan WHERE id = $id";
$result = mysqli_query($conn, $query);
$game = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game - <?= htmlspecialchars($game['nama']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">

    <!-- Container -->
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Game</h2>

        <form action="proses_edit.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <!-- Input Hidden untuk ID -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($game['id']); ?>">

            <!-- Nama Game -->
            <div>
                <label class="block text-gray-700 font-semibold">Nama Game:</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($game['nama']); ?>" required 
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-gray-700 font-semibold">Deskripsi:</label>
                <textarea name="deskripsi" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400"><?= htmlspecialchars($game['deskripsi']); ?></textarea>
            </div>

            <!-- Gambar Saat Ini -->
            <div>
                <label class="block text-gray-700 font-semibold">Gambar Saat Ini:</label>
                <img src="../image/<?= htmlspecialchars($game['gambar']); ?>" alt="Gambar Game" class="w-32 h-32 object-cover rounded-md mt-2">
            </div>

            <!-- Upload Gambar Baru -->
            <div>
                <label class="block text-gray-700 font-semibold">Upload Gambar Baru (Opsional):</label>
                <input type="file" name="gambar" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
