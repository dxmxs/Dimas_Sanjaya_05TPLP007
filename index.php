<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Informasi Manajemen Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="d-flex flex-column flex-md-row vh-100 w-100">
        <!-- Sidebar -->
        <div class="bg-black text-white sidebar p-3 d-none d-md-block" style="width: 250px;">
            <div class="d-flex align-items-center text-center mb-3">
                <img src="images/unpam logo.png" alt="Logo Universitas" class="img-fluid mb-2" style="max-width: 80px;">
                <p class="">Universitas Pamulang</p>
            </div>
            <p>Welcome, Dimas Sanjaya</p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="index.html" class="nav-link text-white active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-white">MENU KARYAWAN</span>
                </li>
                <li class="nav-item">
                    <a href="karyawan.php" target="_blank" class="nav-link text-white"><i class="fas fa-users me-2"></i>Karyawan</a>
                </li>
                <li class="nav-item">
                    <a href="jabatan.php" target="_blank" class="nav-link text-white"><i class="fas fa-briefcase me-2"></i>Jabatan</a>
                </li>
                <li class="nav-item">
                    <a href="divisi.php" class="nav-link text-white"><i class="fas fa-sitemap me-2"></i>Divisi</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-white">MENU ABSENSI</span>
                </li>
                <li class="nav-item">
                    <a href="absensi.php" class="nav-link text-white"><i class="fas fa-calendar-check me-2"></i>Absensi</a>
                </li>
                <li class="nav-item">
                    <a href="izin.php" class="nav-link text-white"><i class="fas fa-file-alt me-2"></i>Izin</a>
                </li>
                <li class="nav-item">
                    <a href="lembur.php" class="nav-link text-white"><i class="fas fa-clock me-2"></i>Lembur</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-end mb-3">
                <a href="login.php" class="btn btn-outline-danger">Logout</a>
            </div>

            <h2 class="mb-4 text-center">Sistem Informasi Manajemen Karyawan</h2>
    
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="karyawan.php" target="_blank" class="card text-center shadow-sm text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x text-primary"></i>
                            <h5 class="card-title mt-3">Data Pegawai</h5>
                            <p class="display-6">
                                <?php 
                                // Query untuk menghitung jumlah data dalam tabel tb_karyawan
                                $sql = mysqli_query($conn, "SELECT COUNT(*) AS total_data FROM tb_karyawan");
                                
                                // Cek apakah ada data
                                if ($sql && mysqli_num_rows($sql) > 0) {
                                    $data = mysqli_fetch_assoc($sql);
                                    echo  $data['total_data']; // Menampilkan jumlah total karyawan
                                } else {
                                    echo "Tidak ada data";
                                }
                                ?>
                            </p>
                        </div>
                    </a>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="absensi.html" class="card text-center shadow-sm text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-calendar-check fa-2x text-success"></i>
                            <h5 class="card-title mt-3">Absensi Hari Ini</h5>
                            <p class="display-6">0</p>
                        </div>
                    </a>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="izin.html" class="card text-center shadow-sm text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-file-alt fa-2x text-info"></i>
                            <h5 class="card-title mt-3">Izin Menunggu Konfirmasi</h5>
                            <p class="display-6">0</p>
                        </div>
                    </a>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="lembur.html" class="card text-center shadow-sm text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-clock fa-2x text-dark"></i>
                            <h5 class="card-title mt-3">Lembur Menunggu Konfirmasi</h5>
                            <p class="display-6">0</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
