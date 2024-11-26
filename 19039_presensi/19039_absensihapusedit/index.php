<?php
include 'koneksi.php';

$query = "SELECT * FROM absensi ORDER BY tanggal DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Data Absensi</h1>
    <a href="absensi.php" class="btn btn-success mb-3">Tambah Absensi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$data['nama']}</td>
                        <td>{$data['tanggal']}</td>
                        <td>{$data['status']}</td>
                        <td>
                            <a href='edit.php?id={$data['id_absensi']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id={$data['id_absensi']}' onclick='return confirm(\"Yakin ingin menghapus?\");' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
