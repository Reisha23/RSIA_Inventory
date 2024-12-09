<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    // Menampilkan halaman utama dengan data barang masuk
    public function index()
    {
        $barangMasuk = BarangMasuk::all(); // Ambil semua data dari tabel
        return view('barang_masuk', compact('barangMasuk')); // Kirim data ke view
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string',
            'total_incoming' => 'required|integer',
            'username' => 'required|string',
        ]);

        // Simpan data ke database
        BarangMasuk::create([
            'item_name' => $request->item_name,
            'total_incoming' => $request->total_incoming,
            'username' => $request->username,
            'incoming_date' => now(),
        ]);

        // Redirect kembali ke halaman barang masuk dengan pesan sukses
        return redirect('/barang-masuk')->with('success', 'Data barang masuk berhasil ditambahkan!');
    }
}

