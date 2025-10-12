<?php
include 'koneksi.php';

// Cek apakah parameter id dikirim
if (!isset($_GET['id'])) {
  header("Location: read.php");
  exit;
}

$id = $_GET['id'];

// Ambil data lama berdasarkan ID
$result = mysqli_query($conn, "SELECT * FROM penyewa WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
  echo "<p>Data tidak ditemukan!</p>";
  exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $jenis_ps = $_POST['jenis_ps'];
  $tanggal = $_POST['tanggal'];
  $jam_mulai = $_POST['jam_mulai'];
  $jam_selesai = $_POST['jam_selesai'];

  $query = "UPDATE penyewa SET 
            nama='$nama',
            email='$email',
            jenis_ps='$jenis_ps',
            tanggal='$tanggal',
            jam_mulai='$jam_mulai',
            jam_selesai='$jam_selesai'
            WHERE id=$id";

  mysqli_query($conn, $query);
  header("Location: read.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Penyewa</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f4f6fa;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
      padding-top: 40px;
    }

    h2 {
      color: #19328a;
      margin-bottom: 15px;
    }

    form {
      background: #fff;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      width: 320px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    button {
      width: 100%;
      background-color: #3366ff;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px;
      border-radius: 6px;
      margin-top: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #2a4edc;
    }

    .links {
      margin-top: 15px;
      text-align: center;
    }

    .links a {
      text-decoration: none;
      color: #19328a;
    }
  </style>
</head>
<body>

  <h2>Edit Data Penyewa</h2>

  <form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required><br>

    <label>Jenis PS:</label><br>
    <select name="jenis_ps" required>
      <option value="PS4" <?= ($data['jenis_ps'] == 'PS4') ? 'selected' : ''; ?>>PS4</option>
      <option value="PS5" <?= ($data['jenis_ps'] == 'PS5') ? 'selected' : ''; ?>>PS5</option>
    </select><br>

    <label>Tanggal:</label><br>
    <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required><br>

    <label>Jam Mulai:</label><br>
    <input type="time" name="jam_mulai" value="<?= $data['jam_mulai']; ?>" required><br>

    <label>Jam Selesai:</label><br>
    <input type="time" name="jam_selesai" value="<?= $data['jam_selesai']; ?>" required><br><br>

    <button type="submit">Simpan Perubahan</button>
  </form>

  <div class="links">
    <a href="read.php">← Kembali ke Daftar Penyewa</a>
  </div>

</body>
</html>
