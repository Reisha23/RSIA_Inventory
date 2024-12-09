<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Style for Button */
        .btn-gray {
            background-color: #6c757d; /* Warna abu-abu untuk tombol */
            color: white; /* Warna teks putih */
            border: none; /* Menghilangkan border default */
            font-size: 1rem; /* Ukuran font tombol */
            font-weight: 500; /* Berat font */
            padding: 10px 20px; /* Padding dalam tombol */
            border-radius: 8px; /* Sudut tombol yang membulat */
            cursor: pointer; /* Menambahkan pointer saat hover */
            text-align: center; /* Menyejajarkan teks di tengah */
            text-decoration: none; /* Menghapus garis bawah */
            transition: background-color 0.3s; /* Transisi saat hover */
        }

        .btn-gray:hover {
            background-color: #5a6268; /* Warna abu-abu lebih gelap saat hover */
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Data Barang Keluar</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Barang A</td>
                    <td>10</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Barang B</td>
                    <td>20</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <!-- Form Input -->
        <h2 class="mt-4">Tambah Data Barang Keluar</h2>
        <form action="/submit_barang_masuk" method="POST">
            <div class="form-group">
                <label for="namaBarang">Nama Barang</label>
                <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Masukkan Nama Barang" required>
            </div>
            <div class="form-group">
                <label for="jumlahBarang">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlahBarang" name="jumlahBarang" placeholder="Masukkan Jumlah Barang" required>
            </div>
            <div class="form-group">
                <label for="namaUser">Nama User</label>
                <input type="text" class="form-control" id="namaUser" name="namaUser" placeholder="Masukkan Nama User" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="{{ url('/home') }}" class="btn btn-gray mt-4">Kembali ke Dashboard</a>
    </div>
</body>
</html>
