<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventory RSIA')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            height: 100vh;
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
            overflow: auto;
            transition: width 0.3s;
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

        .sidebar-toggle {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transition: width 0.3s;
            }

            .sidebar.open {
                width: 250px;
            }

            .sidebar-toggle {
                display: block;
                background-color: #343a40;
                color: white;
                padding: 10px;
                cursor: pointer;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>

    @stack('css')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">Inventory RSIA</h3>
        <a href="{{ route('dashboard') }}">Beranda</a>
        <a href="{{ route('supplier.index') }}">Supplier</a>
        <a href="{{ route('item.index') }}">Barang</a>
        <a href="{{ route('barang-masuk.index') }}">Barang Masuk</a>
        <a href="{{ route('barang-keluar.index') }}">Barang Keluar</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="sidebar-toggle" onclick="toggleSidebar()">☰</div>
            <div class="search-bar">
                <input type="text" placeholder="Cari...">
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profil
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>

        <!-- Konten Halaman -->
        @yield('content')
    </div>

    <!-- Skrip JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>

    @stack('scripts')
</body>

</html>
