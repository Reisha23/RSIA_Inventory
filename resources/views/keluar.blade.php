<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <a href="{{ url('/home') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>
</body>
</html>
