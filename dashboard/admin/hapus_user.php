<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pengguna WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "User berhasil dihapus!";
    } else {
        $_SESSION['error'] = "Gagal menghapus user!";
    }

    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['error'] = "ID user tidak ditemukan!";
    header("Location: dashboard.php");
    exit();
}
?>
