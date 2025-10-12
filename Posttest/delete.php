<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus data
    $query = "DELETE FROM penyewa WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Setelah berhasil hapus, kembali ke halaman daftar
        header("Location: read.php?status=deleted");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
