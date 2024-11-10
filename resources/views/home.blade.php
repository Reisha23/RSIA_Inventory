<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <!-- Tambahkan link ke framework CSS seperti Bootstrap atau custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Custom CSS untuk sidebar dan layout */
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            position: fixed;
            height: 100%;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
        .search-bar input {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 style="text-align: center;">Dashboard</h3>
        <a href="#">Beranda</a>
        <a href="#">Barang Masuk</a>
        <a href="#">Barang Keluar</a>
        <a href="#">Profil</a>
        <a href="#">Login</a>
        <a href="#">Logout</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <!-- Top Bar dengan fitur pencarian -->
        <div class="top-bar">
            <div class="search-bar">
                <input type="text" placeholder="Cari...">
            </div>
            <div class="user-profile">
                <a href="#">Profil</a>
            </div>
        </div>

        <h1>Ini adalah halaman home</h1>
        <!-- Tambahkan konten dashboard Anda di sini -->
    </div>

    <!-- Tambahkan script JavaScript jika diperlukan -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
