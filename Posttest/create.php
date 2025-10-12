<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $jenis_ps = $_POST['jenis_ps'];
  $tanggal = $_POST['tanggal'];
  $jam_mulai = $_POST['jam_mulai'];
  $jam_selesai = $_POST['jam_selesai'];

  $query = "INSERT INTO penyewa (nama, email, jenis_ps, tanggal, jam_mulai, jam_selesai)
            VALUES ('$nama', '$email', '$jenis_ps', '$tanggal', '$jam_mulai', '$jam_selesai')";
  mysqli_query($conn, $query);
  header("Location: read.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Penyewa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Tambah Data Penyewa</h2>
  <form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Jenis PS:</label><br>
    <select name="jenis_ps" required>
      <option value="PS4">PS4</option>
      <option value="PS5">PS5</option>
    </select><br>

    <label>Tanggal:</label><br>
    <input type="date" name="tanggal" required><br>

    <label>Jam Mulai:</label><br>
    <input type="time" name="jam_mulai" required><br>

    <label>Jam Selesai:</label><br>
    <input type="time" name="jam_selesai" required><br><br>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

  <p><a href="read.php">Lihat Data Penyewa</a></p>
</body>
</html>
