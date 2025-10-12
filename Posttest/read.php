<?php
include 'koneksi.php';

// Ambil semua data dari tabel penyewa
$result = mysqli_query($conn, "SELECT * FROM penyewa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Penyewa PS</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f4f6fa;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #19328a;
      margin-bottom: 20px;
    }

    table {
      width: 90%;
      margin: 0 auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #3366ff;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .btn {
      padding: 6px 10px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
      color: white;
    }

    .btn-edit {
      background-color: #007bff;
    }

    .btn-delete {
      background-color: #dc3545;
    }

    .btn:hover {
      opacity: 0.9;
    }

    .top-links {
      text-align: center;
      margin-bottom: 15px;
    }

    .top-links a {
      text-decoration: none;
      background-color: #2a4edc;
      color: white;
      padding: 8px 12px;
      border-radius: 6px;
      margin: 0 5px;
      transition: background 0.3s;
    }

    .top-links a:hover {
      background-color: #19328a;
    }

  </style>
</head>
<body>

  <h2>Daftar Penyewa PlayStation</h2>

  <div class="top-links">
    <a href="create.php">+ Tambah Penyewa Baru</a>
    <a href="dashboard.php">← Kembali ke Dashboard</a>
  </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jenis PS</th>
      <th>Tanggal</th>
      <th>Jam Mulai</th>
      <th>Jam Selesai</th>
      <th>Aksi</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= htmlspecialchars($row['nama']); ?></td>
        <td><?= htmlspecialchars($row['email']); ?></td>
        <td><?= htmlspecialchars($row['jenis_ps']); ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td><?= $row['jam_mulai']; ?></td>
        <td><?= $row['jam_selesai']; ?></td>
        <td>
          <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
          <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus data ini?');">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>
