<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lembur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Lembur</h2>
        <p>Halaman ini untuk mengelola data lembur.</p>

        <form id="lemburForm" class="mb-4">
            <div class="mb-3">
                <label for="namaKaryawanLembur" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="namaKaryawanLembur" required>
            </div>
            <div class="mb-3">
                <label for="tanggalLembur" class="form-label">Tanggal Lembur</label>
                <input type="date" class="form-control" id="tanggalLembur" required>
            </div>
            <div class="mb-3">
                <label for="durasiLembur" class="form-label">Durasi Lembur (jam)</label>
                <input type="number" class="form-control" id="durasiLembur" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Lembur</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Lembur</th>
                    <th>Durasi (jam)</th>
                </tr>
            </thead>
            <tbody id="lemburTable">
            </tbody>
        </table>
    </div>

    <script>
        const lemburForm = document.getElementById("lemburForm");
        const lemburTable = document.getElementById("lemburTable");

        function loadData() {
            lemburTable.innerHTML = "";
            let lemburData = JSON.parse(localStorage.getItem("lemburData")) || [];
            lemburData.forEach((lembur, index) => {
                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${lembur.nama}</td>
                    <td>${lembur.tanggal}</td>
                    <td>${lembur.durasi} jam</td>
                </tr>`;
                lemburTable.innerHTML += row;
            });
        }

        function saveData() {
            let lemburData = JSON.parse(localStorage.getItem("lemburData")) || [];
            const nama = document.getElementById("namaKaryawanLembur").value;
            const tanggal = document.getElementById("tanggalLembur").value;
            const durasi = document.getElementById("durasiLembur").value;
            lemburData.push({ nama, tanggal, durasi });
            localStorage.setItem("lemburData", JSON.stringify(lemburData));
            loadData();
        }

        lemburForm.addEventListener("submit", function(e) {
            e.preventDefault();
            saveData();
            lemburForm.reset();
        });

        loadData();
    </script>
</body>
</html>
