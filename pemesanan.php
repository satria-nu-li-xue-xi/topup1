<?php
include 'koneksi.php'; // Pastikan file koneksi ada

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pengguna_id = $_POST['user_id']; // ID pengguna
    $permainan_id = $_POST['game_id']; // ID game
    $jumlah = $_POST['diamond']; // Jumlah diamond

    // Simpan ke database
    $query = "INSERT INTO topup (pengguna_id, permainan_id, jumlah, status) 
              VALUES ('$pengguna_id', '$permainan_id', '$jumlah', 'pending')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pesanan berhasil!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
