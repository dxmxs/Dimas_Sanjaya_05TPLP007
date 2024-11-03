<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE id_karyawan = '$id'");
    
    if($query) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = 'karyawan.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            window.location.href = 'karyawan.php';
        </script>";
    }
}
?>