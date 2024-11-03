<?php 
require "koneksi.php";

if (isset($_POST["btn_submit"])) {
    // Ambil data dari form
    $kode_jabatan = mysqli_real_escape_string($conn, $_POST["kode_jabatan"]);
    $nama_jabatan = mysqli_real_escape_string($conn, $_POST["nama_jabatan"]);
    
    // Query insert data
    $query = "INSERT INTO tb_jabatan (kode_jabatan, nama_jabatan) 
              VALUES ('$kode_jabatan','$nama_jabatan')";
    
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container w- mt-4">


        <!-- Tabel Data -->
        <div class="card">
            <div class="card-header">
                <h2>Data Jabatan</h2>
                <div class="w-25">
                    <a href="index.php" class="btn btn-primary">Back</a>
                    <a href="tambah-jabatan.php" class="btn btn-primary">Tambah Data Jabatan</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jabatan</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM tb_jabatan ORDER BY kode_jabatan ASC");
                        if(mysqli_num_rows($sql) > 0) {
                            while($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['kode_jabatan'] ?></td>
                                    <td><?= $data['nama_jabatan'] ?></td>
                                    <td>
                                        <a href="edit-jabatan.php?id=<?= $data['no'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="javascript:void(0);" onclick="hapusJabatan(<?= $data['no'] ?>)" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function hapusJabatan(id) {
        if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'hapus-jabatan.php?id=' + id;
        }
    }
    </script>
</body>
</html>