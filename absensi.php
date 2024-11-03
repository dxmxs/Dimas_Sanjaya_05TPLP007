<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Absensi</h2>
        <p>Halaman ini untuk mengelola data absensi.</p>

        <form id="absensiForm" class="mb-4">
            <div class="mb-3">
                <label for="namaKaryawan" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="namaKaryawan" required>
            </div>
            <div class="mb-3">
                <label for="tanggalAbsensi" class="form-label">Tanggal Absensi</label>
                <input type="date" class="form-control" id="tanggalAbsensi" required>
            </div>
            <div class="mb-3">
                <label for="statusAbsensi" class="form-label">Status Absensi</label>
                <select class="form-select" id="statusAbsensi" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Absensi</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Absensi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="absensiTable">
            </tbody>
        </table>
    </div>

    <script>
        const absensiForm = document.getElementById("absensiForm");
        const absensiTable = document.getElementById("absensiTable");

        function loadData() {
            absensiTable.innerHTML = "";
            let absensiData = JSON.parse(localStorage.getItem("absensiData")) || [];
            absensiData.forEach((absensi, index) => {
                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${absensi.nama}</td>
                    <td>${absensi.tanggal}</td>
                    <td>${absensi.status}</td>
                </tr>`;
                absensiTable.innerHTML += row;
            });
        }

        function saveData() {
            let absensiData = JSON.parse(localStorage.getItem("absensiData")) || [];
            const nama = document.getElementById("namaKaryawan").value;
            const tanggal = document.getElementById("tanggalAbsensi").value;
            const status = document.getElementById("statusAbsensi").value;
            absensiData.push({ nama, tanggal, status });
            localStorage.setItem("absensiData", JSON.stringify(absensiData));
            loadData();
        }

        absensiForm.addEventListener("submit", function(e) {
            e.preventDefault();
            saveData();
            absensiForm.reset();
        });

        loadData();
    </script>
</body>
</html>
