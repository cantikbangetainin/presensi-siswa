<?php
// Memulai session
session_start();

// Koneksi ke database
require 'koneksi.php';

// Mengecek apakah ada parameter ID untuk dihapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus data absensi berdasarkan ID
    $query = "DELETE FROM absensi WHERE id = '$id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Data absensi berhasil dihapus!'); window.location.href='absensi.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data absensi!'); window.location.href='absensi.php';</script>";
    }
}
?>
