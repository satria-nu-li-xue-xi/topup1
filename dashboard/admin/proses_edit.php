<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    // Jika ada gambar baru
    if (!empty($_FILES["gambar"]["name"])) {
        $targetDir = "../../image/";
        $gambar = basename($_FILES["gambar"]["name"]);
        $targetFilePath = $targetDir . $gambar;
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath);

        // Update database dengan gambar baru
        $query = "UPDATE permainan SET nama='$nama', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    } else {
        // Update tanpa mengubah gambar
        $query = "UPDATE permainan SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?success=Game berhasil diperbarui");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
