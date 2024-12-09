<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-gray {
            background-color: #6c757d;
            color: white;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-gray:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Data Barang Masuk</h1>

        <!-- Table to Display Data -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Nama User</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping Through Data from Backend -->
                @foreach ($barangMasuk as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->item_name }}</td>
                    <td>{{ $data->total_incoming }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->incoming_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form Input -->
        <h2 class="mt-4">Tambah Data Barang Masuk</h2>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="item_id_item">Nama Barang</label>
                <input type="text" class="form-control" id="item_id_item" name="item_id_item" required>
            </div>
            <div class="form-group">
                <label for="total_incoming">Jumlah Barang</label>
                <input type="number" class="form-control" id="total_incoming" name="total_incoming" required>
            </div>
            <div class="form-group">
                <label for="users_id_username">Nama User</label>
                <input type="text" class="form-control" id="users_id_username" name="users_id_username" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="{{ route('home') }}" class="btn btn-gray">Kembali ke Dashboard</a>
    </div>
</body>
</html>
