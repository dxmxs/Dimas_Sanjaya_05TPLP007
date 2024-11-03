<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Izin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Izin</h2>
        <p>Halaman ini untuk mengelola data izin.</p>

        <form id="izinForm" class="mb-4">
            <div class="mb-3">
                <label for="namaKaryawanIzin" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="namaKaryawanIzin" required>
            </div>
            <div class="mb-3">
                <label for="tanggalIzin" class="form-label">Tanggal Izin</label>
                <input type="date" class="form-control" id="tanggalIzin" required>
            </div>
            <div class="mb-3">
                <label for="alasanIzin" class="form-label">Alasan Izin</label>
                <textarea class="form-control" id="alasanIzin" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Izin</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Izin</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody id="izinTable">
            </tbody>
        </table>
    </div>

    <script>
        const izinForm = document.getElementById("izinForm");
        const izinTable = document.getElementById("izinTable");

        function loadData() {
            izinTable.innerHTML = "";
            let izinData = JSON.parse(localStorage.getItem("izinData")) || [];
            izinData.forEach((izin, index) => {
                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${izin.nama}</td>
                    <td>${izin.tanggal}</td>
                    <td>${izin.alasan}</td>
                </tr>`;
                izinTable.innerHTML += row;
            });
        }

        function saveData() {
            let izinData = JSON.parse(localStorage.getItem("izinData")) || [];
            const nama = document.getElementById("namaKaryawanIzin").value;
            const tanggal = document.getElementById("tanggalIzin").value;
            const alasan = document.getElementById("alasanIzin").value;
            izinData.push({ nama, tanggal, alasan });
            localStorage.setItem("izinData", JSON.stringify(izinData));
            loadData();
        }

        izinForm.addEventListener("submit", function(e) {
            e.preventDefault();
            saveData();
            izinForm.reset();
        });

        loadData();
    </script>
</body>
</html>
