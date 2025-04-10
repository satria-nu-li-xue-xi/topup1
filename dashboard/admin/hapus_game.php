<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama gambar sebelum menghapus
    $query = "SELECT gambar FROM permainan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $game = $result->fetch_assoc();

    if ($game) {
        // Hapus gambar dari folder
        unlink("../image/" . $game['gambar']);

        // Hapus data dari database
        $query = "DELETE FROM permainan WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Game berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus game!";
        }
    } else {
        $_SESSION['error'] = "Game tidak ditemukan!";
    }

    header("Location: dashboard.php");
    exit();
}
?>
