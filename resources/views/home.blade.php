<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory RSIA</title>
    <!-- Hubungkan Bootstrap dari CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk tata letak sidebar dan header */
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
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">Inventory RSIA</h3>
        <a href="#">Beranda</a>
        <a href="#">Barang Masuk</a>
        <a href="#">Barang Keluar</a>
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
                <a class="dropdown-item" href="#">Edit Profil</a>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    </div>

        <h1>Total Barang masuk dan keluar</h1>
        <div class="row">
            <!-- Card untuk Diagram -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Diagram Barang Masuk
                    </div>
                    <div class="card-body">
                        <canvas id="chartBarangMasuk" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Diagram Barang Keluar
                    </div>
                    <div class="card-body">
                        <canvas id="chartBarangKeluar" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hubungkan JavaScript Bootstrap dan Chart.js dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script untuk Sidebar Responsif -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>

    <!-- Inisialisasi Chart.js untuk diagram -->
    <script>
        var ctxBarangMasuk = document.getElementById('chartBarangMasuk').getContext('2d');
        var chartBarangMasuk = new Chart(ctxBarangMasuk, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
                datasets: [{
                    label: 'Jumlah Barang Masuk',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxBarangKeluar = document.getElementById('chartBarangKeluar').getContext('2d');
        var chartBarangKeluar = new Chart(ctxBarangKeluar, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
                datasets: [{
                    label: 'Jumlah Barang Keluar',
                    data: [5, 10, 8, 6, 7],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
