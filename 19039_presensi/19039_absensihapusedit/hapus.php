<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $con->prepare("DELETE FROM absensi WHERE id_absensi = ?");
    $stmt->bind_param("i", $id);  // "i" berarti integer
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
}

