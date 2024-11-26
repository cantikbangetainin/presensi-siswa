<?php
require "koneksi.php";

// Memeriksa apakah ada parameter 'id' di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk mengambil data berdasarkan id_absensi
    $query = mysqli_query($con, "SELECT * FROM absensi WHERE id_absensi = '$id'");
    
    // Memeriksa apakah query menghasilkan data
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);  // Ambil data dari query
    } else {
        // Jika tidak ada data yang ditemukan, tampilkan pesan dan hentikan eksekusi
        echo "Data tidak ditemukan!";
        exit;
    }
}

// Proses update data absensi
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    // Update data berdasarkan id_absensi
    $query = mysqli_query($con, "UPDATE absensi SET nama = '$nama', tanggal = '$tanggal', status = '$status' WHERE id_absensi = '$id'");

    // Jika query berhasil, arahkan kembali ke halaman index
    if ($query) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Edit Data Absensi</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $data['id_absensi']; ?>">
        
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
        </div>

        <!-- Input untuk Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="Hadir" <?php if ($data['status'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                <option value="Izin" <?php if ($data['status'] == 'Izin') echo 'selected'; ?>>Izin</option>
                <option value="Sakit" <?php if ($data['status'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
                <option value="Alpha" <?php if ($data['status'] == 'Alpha') echo 'selected'; ?>>Alpha</option>
            </select>
        </div>

        <!-- Tombol untuk submit form -->
        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
