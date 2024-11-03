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
      <div class="">
        <a href="index.php" class="btn btn-primary">
          ⬅ Kembali
        </a>
        <a href="tambah-karyawan.php" class="btn btn-primary">Tambah Data Karyawan</a>
      </div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"> Data Karyawan</h2>
            </div>
        </div>
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="karyawanTable">
        <?php 
        $no = 1;
        $sql = mysqli_query($conn, "SELECT * FROM tb_karyawan");
        if(mysqli_num_rows($sql) > 0) {
            while($data = mysqli_fetch_assoc($sql)) {
                ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nama_karyawan'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['jabatan'] ?></td>
                    <td>
                        <a href="edit-karyawan.php?id=<?= $data['id_karyawan'] ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="javascript:void(0);" onclick="hapusData(<?= $data['id_karyawan'] ?>)" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            <?php
        }
        ?>        
    </tbody>
</table>
    </div>
    <script>
function hapusData(id) {
    if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = 'hapus-karyawan.php?id=' + id;
    }
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>