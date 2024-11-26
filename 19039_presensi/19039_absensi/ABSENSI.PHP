<?php
// Memulai session
session_start();

// Koneksi ke database
require 'koneksi.php';

// Proses pencatatan absensi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal = date("Y-m-d"); // Mengambil tanggal hari ini
    $status = $_POST['status'];

    // Menyimpan data absensi
    $query = "INSERT INTO absensi (nama, tanggal, status) VALUES ('$nama', '$tanggal', '$status')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Absensi berhasil dicatat!');</script>";
    } else {
        echo "<script>alert('Gagal mencatat absensi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS tambahan untuk mempercantik tampilan */
        body {
            background-color: #fce4ec; /* Pink muda */
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        h1, h2 {
            color: #880e4f; /* Pink gelap */
        }
        .form-label {
            font-weight: bold;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border: 1px solid #ec407a; /* Border pink */
        }
        table {
            margin-top: 30px;
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #f8bbd0; /* Warna pink terang */
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
        }
        th {
            background-color: #ec407a; /* Pink utama */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #fce4ec; /* Pink muda */
        }
        tr:hover {
            background-color: #f8bbd0; /* Pink lebih terang */
        }
        .btn-primary {
            background-color: #ec407a; /* Pink utama */
            border: none;
        }
        .btn-primary:hover {
            background-color: #d81b60; /* Pink lebih gelap */
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Form Absensi dalam Kotak -->
    <div class="card p-4">
        <h1>Form Absensi</h1>
        <form method="POST" action="absensi.php">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpha">Alpha</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Absensi</button>
        </form>
    </div>

    <!-- Tabel Absensi dalam Kotak -->
    <div class="card p-4 mt-4">
        <h2>Data Absensi</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data absensi
                $result = mysqli_query($con, "SELECT * FROM absensi ORDER BY tanggal DESC");
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$data['nama']}</td>
                            <td>{$data['tanggal']}</td>
                            <td>{$data['status']}</td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
