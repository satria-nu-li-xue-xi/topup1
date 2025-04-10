<?php
include 'koneksi.php'; // file koneksi kamu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_pengguna = $_POST['username'];
  $email         = $_POST['email'];
  $kata_sandi    = $_POST['password'];

  if (!empty($nama_pengguna) && !empty($email) && !empty($kata_sandi)) {
    $md5_password = md5($kata_sandi);

    $stmt = $conn->prepare("INSERT INTO pengguna (nama_pengguna, email, kata_sandi) VALUES (?, ?, ?)");
    if (!$stmt) {
      die("Query error: " . $conn->error);
    }

    $stmt->bind_param("sss", $nama_pengguna, $email, $md5_password);

    if ($stmt->execute()) {
      $pesan = "Registrasi berhasil!";
    } else {
      $pesan = "Gagal registrasi: " . $stmt->error;
    }
  } else {
    $pesan = "Semua kolom harus diisi!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Buat Akun Baru</h2>

    <?php if (isset($pesan)): ?>
      <div class="mb-4 text-center text-sm font-medium text-white bg-<?php echo ($pesan == 'Registrasi berhasil!') ? 'green' : 'red'; ?>-500 p-2 rounded-lg">
        <?= $pesan ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-700">Username</label>
        <input type="text" name="username" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <button type="submit"
        class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition duration-200">
        Daftar
      </button>
    </form>
  </div>

</body>
</html>
