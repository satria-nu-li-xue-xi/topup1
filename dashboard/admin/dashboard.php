<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    header("Location: ../../index.php");
    exit();
}

// Ambil data user dari database
$query = "SELECT * FROM pengguna";
$result = $conn->query($query);

// Ambil daftar permainan
$queryGames = "SELECT * FROM permainan";
$resultGames = $conn->query($queryGames);

// Ambil data top-up
$queryTopup = "
    SELECT t.id, p.nama_pengguna, g.nama AS nama_game, t.jumlah, t.status, t.dibuat_pada 
    FROM topup t
    JOIN pengguna p ON t.pengguna_id = p.id
    JOIN permainan g ON t.permainan_id = g.id
    ORDER BY t.id DESC";
$resultTopup = $conn->query($queryTopup);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-gray-900 text-white p-5">
            <h1 class="text-2xl font-bold">Admin Panel</h1>
            <ul class="mt-5 space-y-2">
                <li><a href="#users" class="block p-2 hover:bg-gray-700">Users</a></li>
                <li><a href="#games" class="block p-2 hover:bg-gray-700">Games</a></li>
                <li><a href="#topups" class="block p-2 hover:bg-gray-700">Top-up Requests</a></li>
                <form action="../../auth/logout.php" method="post">
                    <button class="px-5 py-2 m-2 bg-red-200 text-red-800 rounded-full hover:bg-red-300" type="submit">Logout</button>
                </form>
            </ul>
        </div>

        <!-- Content -->
        <div class="w-4/5 p-5">
            <!-- Users Section -->
            <section id="users" class="bg-white p-5 rounded-lg shadow mb-5">
                <h2 class="text-xl font-bold mb-3">Users</h2>
                <table class="w-full border">
                    <tr class="bg-gray-200">
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Email</th>
                        <th class="p-2 border">Level</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="p-2 border"><?= $row['id']; ?></td>
                            <td class="p-2 border"><?= $row['nama_pengguna']; ?></td>
                            <td class="p-2 border"><?= $row['email']; ?></td>
                            <td class="p-2 border"><?= $row['level']; ?></td>
                            <td class="p-2 border">
                                <a href="hapus_user.php?id=<?= $row['id']; ?>" 
                                   class="bg-red-500 text-white px-3 py-1 rounded"
                                   onclick="return confirm('Yakin ingin menghapus user ini?');">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </section>

            <!-- Manage Games Section -->
            <section id="games" class="bg-white p-5 rounded-lg shadow mb-5">
                <h2 class="text-xl font-bold mb-3">Manage Games</h2>
                <form action="tambah_game.php" method="post" enctype="multipart/form-data" class="mb-5">
                    <input type="text" name="nama" placeholder="Nama Game" required class="border p-2 w-full">
                    <textarea name="deskripsi" placeholder="Deskripsi Game" required class="border p-2 w-full mt-2"></textarea>
                    <input type="file" name="gambar" required class="border p-2 w-full mt-2">
                    <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded">Tambah Game</button>
                </form>
                <table class="w-full border">
                    <tr class="bg-gray-200">
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Deskripsi</th>
                        <th class="p-2 border">Gambar</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                    <?php while ($game = $resultGames->fetch_assoc()): ?>
                        <tr>
                            <td class="p-2 border"><?= $game['id']; ?></td>
                            <td class="p-2 border"><?= $game['nama']; ?></td>
                            <td class="p-2 border"><?= $game['deskripsi']; ?></td>
                            <td class="p-2 border"><img src="../image/<?= $game['gambar']; ?>" width="100"></td>
                            <td class="p-2 border">
                                <a href="edit_game.php?id=<?= $game['id']; ?>" class="bg-green-500 text-white px-3 py-1 rounded">Edit</a>
                                <a href="hapus_game.php?id=<?= $game['id']; ?>" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Yakin ingin menghapus game ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </section>

            <!-- Top-Up Requests Section -->
            <section id="topups" class="bg-white p-5 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-3">Top-up Requests</h2>

                <table class="w-full border">
                    <tr class="bg-gray-200">
                        <th class="p-2 border">ID Top-Up</th>
                        <th class="p-2 border">Nama Pengguna</th>
                        <th class="p-2 border">Game</th>
                        <th class="p-2 border">Jumlah</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>

                    <?php while ($topup = $resultTopup->fetch_assoc()): ?>
                        <tr>
                            <td class="p-2 border"><?= $topup['id']; ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($topup['nama_pengguna']); ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($topup['nama_game']); ?></td>
                            <td class="p-2 border"><?= number_format($topup['jumlah'], 2); ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($topup['status']); ?></td>
                            <td class="p-2 border"><?= $topup['dibuat_pada']; ?></td>
                            <td class="p-2 border">
                                <form action="update_pesanan.php" method="post" class="inline">
                                    <input type="hidden" name="topup_id" value="<?= $topup['id']; ?>">
                                    <select name="status" class="border p-1">
                                        <option value="pending" <?= $topup['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="selesai" <?= $topup['status'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                                        <option value="gagal" <?= $topup['status'] == 'gagal' ? 'selected' : ''; ?>>Gagal</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
