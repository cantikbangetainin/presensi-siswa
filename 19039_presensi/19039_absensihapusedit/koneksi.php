<?php
$host = "localhost"; // Nama host
$user = "root";      // Username database
$pass = "";          // Password database
$db   = "19039_psas"; // Nama database

$con = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
