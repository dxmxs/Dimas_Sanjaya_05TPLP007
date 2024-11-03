<?php 
require "koneksi.php";

if (isset($_POST["btn_submit"])) {
    // Ambil data dari form
    $nama_karyawan = mysqli_real_escape_string($conn, $_POST["nama_karyawan"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
    $jabatan = mysqli_real_escape_string($conn, $_POST["jabatan"]);
    
    // Query insert data
    $query = "INSERT INTO tb_karyawan (nama_karyawan, email, alamat, jabatan) 
              VALUES ('$nama_karyawan', '$email', '$alamat', '$jabatan')";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan data: " . mysqli_error($conn) . "');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="container mt-4">
        <a href="karyawan.php" class="btn btn-primary mb-3">
            ⬅ Kembali
        </a>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Tambah Data Karyawan</h2>
            </div>
            <div class="card-body">
                <form id="karyawanForm" method="post">
                    <div class="mb-3">
                        <label for="namaKaryawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="namaKaryawan" name="nama_karyawan" required />
                    </div>
                    <div class="mb-3">
                        <label for="emailKaryawan" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailKaryawan" name="email" required />
                    </div>
                    <div class="mb-3">
                        <label for="alamatKaryawan" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamatKaryawan" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jabatanKaryawan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatanKaryawan" name="jabatan" required />
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_submit">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>