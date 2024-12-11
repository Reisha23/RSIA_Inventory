<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Item;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $outItems = BarangKeluar::with('item')->get();
        $items = Item::all();
        return view('barang-keluar.index', compact('outItems', 'items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'out_date' => 'required|date',
            'item_id_item' => 'required|exists:item,id_item',
            'total_out' => 'required|integer'
        ]);

        $validatedData['users_id_username'] = auth()->user()->id;

        BarangKeluar::create($validatedData);

        // Kurangi stok barang
        $item = Item::findOrFail($request->item_id_item);
        $item->total_stock -= $request->total_out;
        $item->save();

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $outItem = BarangKeluar::findOrFail($id);
        $items = Item::all();
        return view('barang-keluar.edit', compact('outItem', 'items'));
    }

    public function update(Request $request, $id)
    {
        $outItem = BarangKeluar::findOrFail($id);

        $validatedData = $request->validate([
            'out_date' => 'required|date',
            'item_id_item' => 'required|exists:item,id_item',
            'total_out' => 'required|integer'
        ]);

        // Kurangi stok barang
        $item = Item::findOrFail($outItem->item_id_item);
        $item->total_stock += $outItem->total_out;
        $item->total_stock -= $request->total_out;
        $item->save();

        $outItem->update($validatedData);

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil diupdate');
    }

    public function destroy($id)
    {
        $outItem = BarangKeluar::findOrFail($id);
        $outItem->delete();
        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dihapus');
    }
}
