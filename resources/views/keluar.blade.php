<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
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
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Barang A</td>
                    <td>10</td>
                    <td>2024-11-16</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Barang B</td>
                    <td>5</td>
                    <td>2024-11-15</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('/home') }}" class="btn btn-gray">Kembali ke Dashboard</a>
    </div>
</body>
</html>
