<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Item;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $incomingItems = BarangMasuk::with('item')->get();
        $items = Item::all();

        return view('barang-masuk.index', compact('incomingItems', 'items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'incoming_date' => 'required|date',
            'item_id_item' => 'required|exists:item,id_item',
            'total_incoming' => 'required|integer|min:1'
        ], [
            'incoming_date.required' => 'Tanggal masuk harus diisi.',
            'incoming_date.date' => 'Tanggal masuk harus berupa format tanggal yang valid.',
            'item_id_item.required' => 'Nama barang harus dipilih.',
            'item_id_item.exists' => 'Barang yang dipilih tidak valid.',
            'total_incoming.required' => 'Total masuk harus diisi.',
            'total_incoming.integer' => 'Total masuk harus berupa angka.',
            'total_incoming.min' => 'Total masuk minimal 1.'
        ]);

        $validatedData['users_id_username'] = auth()->user()->id;

        BarangMasuk::create($validatedData);

        // Tambah stok barang
        $item = Item::findOrFail($request->item_id_item);
        $item->total_stock += $request->total_incoming;
        $item->save();

        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $incomingItem = BarangMasuk::findOrFail($id);
        $items = Item::all();
        return view('barang-masuk.edit', compact('incomingItem', 'items'));
    }

    public function update(Request $request, $id)
    {
        $incomingItem = BarangMasuk::findOrFail($id);

        $validatedData = $request->validate([
            'incoming_date' => 'required|date',
            'item_id_item' => 'required|exists:item,id_item',
            'total_incoming' => 'required|integer|min:1'
        ], [
            'incoming_date.required' => 'Tanggal masuk harus diisi.',
            'incoming_date.date' => 'Tanggal masuk harus berupa format tanggal yang valid.',
            'item_id_item.required' => 'Nama barang harus dipilih.',
            'item_id_item.exists' => 'Barang yang dipilih tidak valid.',
            'total_incoming.required' => 'Total masuk harus diisi.',
            'total_incoming.integer' => 'Total masuk harus berupa angka.',
            'total_incoming.min' => 'Total masuk minimal 1.'
        ]);

        // Kurangi stok barang sebelum diupdate atau bandingkan dengan total_incoming sebelumnya
        $item = Item::findOrFail($incomingItem->item_id_item);
        $item->total_stock -= $incomingItem->total_incoming;
        $item->total_stock += $request->total_incoming;
        $item->save();

        $incomingItem->update($validatedData);

        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil diupdate');
    }

    public function destroy($id)
    {
        $incomingItem = BarangMasuk::findOrFail($id);
        $incomingItem->delete();
        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil dihapus');
    }
}
