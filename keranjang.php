<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: auth/login.php");
    exit();
}

$user_logged_in = $_SESSION['user_logged_in']; // Ambil ID pengguna yang login

// Cek koneksi database sebelum query
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil data top-up yang dilakukan oleh user yang sedang login
$query = "SELECT topup.id, permainan.nama AS nama_permainan, topup.jumlah, topup.status, topup.dibuat_pada 
          FROM topup
          JOIN permainan ON topup.permainan_id = permainan.id
          WHERE topup.pengguna_id = ? 
          ORDER BY topup.dibuat_pada DESC";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Query gagal: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Perbaikan path CSS -->
</head>
<body>

    <h2>Keranjang Top-Up</h2>
    
    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Game</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_permainan']); ?></td>
                <td>Rp<?php echo number_format($row['jumlah'], 2, ',', '.'); ?></td>
                <td>
                    <?php
                    // Menampilkan status dengan warna
                    $status = strtolower($row['status']);
                    if ($status == 'pending') {
                        echo "<span style='color: orange;'>Pending</span>";
                    } elseif ($status == 'selesai') {
                        echo "<span style='color: green;'>Selesai</span>";
                    } elseif ($status == 'gagal') {
                        echo "<span style='color: red;'>Gagal</span>";
                    } else {
                        echo ucfirst($status);
                    }
                    ?>
                </td>
                <td><?php echo date('d-m-Y H:i', strtotime($row['dibuat_pada'])); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Anda belum melakukan top-up.</p>
    <?php endif; ?>

    <br>
    <a href="index.php">Kembali ke Dashboard</a> <!-- Perbaikan path -->
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
