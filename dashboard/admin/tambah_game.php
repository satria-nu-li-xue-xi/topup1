<?php
session_start();
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    
    // Pastikan folder image di luar dashboard/admin bisa diakses
    $targetDir = __DIR__ . "../../image/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Cek apakah file diunggah dengan benar
    $gambar = $_FILES['gambar'];
    if ($gambar['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Error saat upload gambar: " . $gambar['error'];
        header("Location: dashboard.php");
        exit();
    }

    // Validasi format gambar
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    $gambarName = time() . "_" . basename($gambar["name"]);
    $fileExtension = strtolower(pathinfo($gambarName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedFormats)) {
        $_SESSION['error'] = "Format gambar tidak didukung!";
        header("Location: dashboard.php");
        exit();
    }

    $targetFile = $targetDir . $gambarName;

    // Pindahkan file yang diunggah
    if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
        // Simpan ke database
        $query = "INSERT INTO permainan (nama, deskripsi, gambar) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $nama, $deskripsi, $gambarName);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Game berhasil ditambahkan!";
        } else {
            $_SESSION['error'] = "Gagal menambahkan game!";
        }
    } else {
        $_SESSION['error'] = "Gagal mengupload gambar!";
    }

    header("Location: dashboard.php");
    exit();
}
?>
