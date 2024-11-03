<?php 
require "koneksi.php";

if (isset($_POST["btn_submit"])) {
    // Ambil data dari form
    $kode_jabatan = mysqli_real_escape_string($conn, $_POST["kode_jabatan"]);
    $nama_jabatan = mysqli_real_escape_string($conn, $_POST["nama_jabatan"]);

    
    // Query insert data
    $query = "INSERT INTO tb_jabatan (kode_jabatan,nama_jabatan) 
              VALUES ('$kode_jabatan', '$nama_jabatan')";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.href = 'jabatan.php';
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Data Jabatan</h2>
        <div class="w-25">
                    <a href="jabatan.php" class="btn btn-primary">Back</a>
                </div>

        <form id="jabatanForm" class="mb-4" method="post">
            <div class="mb-3">
                <label for="kodejabatan" class="form-label">Kode Jabatan</label>
                <input type="text" class="form-control" id="kodejabatan" name="kode_jabatan" required>
            </div>
            <div class="mb-3">
                <label for="namajabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="namajabatan" name="nama_jabatan" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_submit">submit</button>
        </form>
    </div>
</body>
</html>
