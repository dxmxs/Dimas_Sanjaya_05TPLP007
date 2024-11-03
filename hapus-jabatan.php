<?php
require "koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = mysqli_query($conn, "DELETE FROM tb_jabatan WHERE no = '$id'");
    
    if($query) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = 'jabatan.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href = 'index.php';
        </script>";
    }
}
?>