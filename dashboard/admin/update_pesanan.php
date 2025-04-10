<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['status'])) {
    $order_id = intval($_POST['id']);  // Menggunakan variabel $order_id, bukan $id
    $status = $_POST['status'];

    // Update status di database
    $query = "UPDATE topup SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $order_id);  // Binding dengan variabel $order_id
    if ($stmt->execute()) {
        $_SESSION['success'] = "Status pesanan berhasil diperbarui!";
    } else {
        $_SESSION['error'] = "Gagal memperbarui status pesanan.";
    }

    // Redirect ke dashboard dan menampilkan pemberitahuan
    header("Location: dashboard.php");   
    exit();
}
?>
