@extends('layouts.master')

@section('title', 'Dashboard Inventory')

@section('content')
<div class="container-fluid">
    <h1>Dashboard Inventory</h1>

    <div class="row">
        <!-- Kartu Statistik -->
        <div class="col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5>Total Supplier</h5>
                    <h2>{{ $totalSuppliers }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5>Total Barang</h5>
                    <h2>{{ $totalItems }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h5>Barang Masuk Bulan Ini</h5>
                    <h2>{{ $totalIncomingItems }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h5>Barang Keluar Bulan Ini</h5>
                    <h2>{{ $totalOutItems }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Diagram -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Diagram Barang Masuk Tahunan
                </div>
                <div class="card-body">
                    <canvas id="chartBarangMasuk" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Diagram Barang Keluar Tahunan
                </div>
                <div class="card-body">
                    <canvas id="chartBarangKeluar" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Data untuk grafik barang masuk
    var ctx1 = document.getElementById('chartBarangMasuk').getContext('2d');
    var chartBarangMasuk = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: @json($incomingItemsChart['labels']),
            datasets: [{
                label: 'Barang Masuk',
                data: @json($incomingItemsChart['data']),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
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

    // Data untuk grafik barang keluar
    var ctx2 = document.getElementById('chartBarangKeluar').getContext('2d');
    var chartBarangKeluar = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: @json($outItemsChart['labels']),
            datasets: [{
                label: 'Barang Keluar',
                data: @json($outItemsChart['data']),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
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
</script>
@endpush
