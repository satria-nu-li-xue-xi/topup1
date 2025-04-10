<?php
$host = "localhost";       // Ganti kalau server bukan localhost
$user = "root";            // Ganti sesuai user database kamu
$pass = "";                // Ganti sesuai password database kamu
$db   = "stack2025";   // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
