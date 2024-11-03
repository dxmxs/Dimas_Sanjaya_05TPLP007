<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'");
    $data = mysqli_fetch_assoc($query);
}

if(isset($_POST['submit'])) {
    $nama_karyawan = $_POST['nama_karyawan'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    
    $query = mysqli_query($conn, "UPDATE tb_karyawan SET 
        nama_karyawan = '$nama_karyawan',
        email = '$email',
        alamat = '$alamat',
        jabatan = '$jabatan'
        WHERE id_karyawan = '$id'");
        
    if($query) {
        echo "<script>
            alert('Data berhasil diupdate');
            window.location.href = 'karyawan.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diupdate');
            window.location.href = 'karyawan.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit Data Karyawan</h2>
            </div>
            <div class="card-body">
            <form method="POST">
    <div class="form-group">
        <label>Nama Karyawan</label>
        <input type="text" name="nama_karyawan" class="form-control" value="<?= $data['nama_karyawan'] ?>" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= $data['email'] ?>" required>
    </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>" required>
        </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
            </div>
        </div>
    </div>
</body>
</html>




