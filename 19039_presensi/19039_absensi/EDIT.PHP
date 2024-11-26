<?php
// Memulai session
session_start();

// Koneksi ke database
require 'koneksi.php';

// Mengambil data absensi berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM absensi WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);
}

// Proses pembaruan absensi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $status = $_POST['status'];

    // Mengupdate data absensi berdasarkan ID
    $query = "UPDATE absensi SET nama = '$nama', status = '$status' WHERE id = '$id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Data absensi berhasil diperbarui!'); window.location.href='absensi.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data absensi!'); window.location.href='absensi.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h1>Edit Absensi</h1>
        <form method="POST" action="edit_absensi.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="Hadir" <?php if ($data['status'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                    <option value="Izin" <?php if ($data['status'] == 'Izin') echo 'selected'; ?>>Izin</option>
                    <option value="Sakit" <?php if ($data['status'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
                    <option value="Alpha" <?php if ($data['status'] == 'Alpha') echo 'selected'; ?>>Alpha</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Absensi</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
