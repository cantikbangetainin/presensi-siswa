<?php
$host = "localhost";  // Sesuaikan dengan host database Anda
$user = "root";       // Sesuaikan dengan username database Anda
$pass = "";           // Sesuaikan dengan password database Anda
$db   = "19039_psas"; // Nama database Anda (ubah sesuai kebutuhan)

// Membuat koneksi ke database
$con = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke database: " . mysqli_connect_error();
    exit();
}
?>
