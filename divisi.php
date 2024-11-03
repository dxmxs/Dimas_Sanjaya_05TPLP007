<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Divisi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Divisi</h2>
        <p>Halaman ini untuk mengelola data divisi.</p>

        <form id="divisiForm" class="mb-4">
            <div class="mb-3">
                <label for="namaDivisi" class="form-label">Nama Divisi</label>
                <input type="text" class="form-control" id="namaDivisi" required>
            </div>
            <div class="mb-3">
                <label for="deskripsiDivisi" class="form-label">Deskripsi Divisi</label>
                <textarea class="form-control" id="deskripsiDivisi" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Divisi</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody id="divisiTable">
            </tbody>
        </table>
    </div>

    <script>
        const divisiForm = document.getElementById("divisiForm");
        const divisiTable = document.getElementById("divisiTable");

        function loadData() {
            divisiTable.innerHTML = "";
            let divisiData = JSON.parse(localStorage.getItem("divisiData")) || [];
            divisiData.forEach((divisi, index) => {
                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${divisi.nama}</td>
                    <td>${divisi.deskripsi}</td>
                </tr>`;
                divisiTable.innerHTML += row;
            });
        }

        function saveData() {
            let divisiData = JSON.parse(localStorage.getItem("divisiData")) || [];
            const nama = document.getElementById("namaDivisi").value;
            const deskripsi = document.getElementById("deskripsiDivisi").value;
            divisiData.push({ nama, deskripsi });
            localStorage.setItem("divisiData", JSON.stringify(divisiData));
            loadData();
        }

        divisiForm.addEventListener("submit", function(e) {
            e.preventDefault();
            saveData();
            divisiForm.reset();
        });

        loadData();
    </script>
</body>
</html>
