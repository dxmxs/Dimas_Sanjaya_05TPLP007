<?php
require "koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tb_jabatan WHERE no = '$id'");
    $data = mysqli_fetch_assoc($query);
}

if(isset($_POST['update'])) {
    $kode_jabatan = mysqli_real_escape_string($conn, $_POST["kode_jabatan"]);
    $nama_jabatan = mysqli_real_escape_string($conn, $_POST["nama_jabatan"]);
    
    $query = mysqli_query($conn, "UPDATE tb_jabatan SET 
        kode_jabatan = '$kode_jabatan',
        nama_jabatan = '$nama_jabatan'
        WHERE no = '$id'");
        
    if($query) {
        echo "<script>
            alert('Data berhasil diupdate');
            window.location.href = 'jabatan.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengupdate data');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Data Jabatan</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="kodeJabatan" class="form-label">Kode Jabatan</label>
                        <input type="text" class="form-control" id="kodeJabatan" name="kode_jabatan" value="<?= $data['kode_jabatan'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="namaJabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control" id="namaJabatan" name="nama_jabatan" value="<?= $data['nama_jabatan'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>