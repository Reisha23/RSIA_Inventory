<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Statistik Umum
        $totalSuppliers = Supplier::count();
        $totalItems = Item::count();
        $totalIncomingItems = BarangMasuk::whereMonth('incoming_date', now()->month)->sum('total_incoming');
        $totalOutItems = BarangKeluar::whereMonth('out_date', now()->month)->sum('total_out');

        // Data untuk Grafik Barang Masuk (Per Bulan)
        $incomingItemsChart = $this->getMonthlyIncomingItemsData();
        $outItemsChart = $this->getMonthlyOutItemsData();

        return view('home', [
            'totalSuppliers' => $totalSuppliers,
            'totalItems' => $totalItems,
            'totalIncomingItems' => $totalIncomingItems,
            'totalOutItems' => $totalOutItems,
            'incomingItemsChart' => $incomingItemsChart,
            'outItemsChart' => $outItemsChart
        ]);
    }

    private function getMonthlyIncomingItemsData()
    {
        // Ambil data barang masuk dalam 6 bulan terakhir
        $incomingItems = BarangMasuk::select(
            DB::raw('MONTH(incoming_date) as month'),
            DB::raw('SUM(total_incoming) as total')
        )
        ->whereYear('incoming_date', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Siapkan data untuk chart
        $labels = [];
        $data = [];

        // Gunakan nama bulan dalam bahasa Indonesia
        $monthNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        // Isi data untuk setiap bulan
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $monthNames[$i];

            // Cari total untuk bulan yang sesuai
            $monthData = $incomingItems->firstWhere('month', $i);
            $data[] = $monthData ? $monthData->total : 0;
        }

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }

    private function getMonthlyOutItemsData()
    {
        // Ambil data barang keluar dalam 6 bulan terakhir
        $outItems = BarangKeluar::select(
            DB::raw('MONTH(out_date) as month'),
            DB::raw('SUM(total_out) as total')
        )
        ->whereYear('out_date', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Siapkan data untuk chart
        $labels = [];
        $data = [];

        // Gunakan nama bulan dalam bahasa Indonesia
        $monthNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        // Isi data untuk setiap bulan
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $monthNames[$i];

            // Cari total untuk bulan yang sesuai
            $monthData = $outItems->firstWhere('month', $i);
            $data[] = $monthData ? $monthData->total : 0;
        }

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}

