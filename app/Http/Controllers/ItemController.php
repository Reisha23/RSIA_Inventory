<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('itemType')->get();
        $itemTypes = ItemType::all();

        return view('items.index', compact('items', 'itemTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_type' => 'required|exists:item_type,id_type',
            'item_name' => 'required|string|max:255|unique:item,item_name',
            'total_stock' => 'required|numeric|min:0',
        ]);

        Item::create($request->all());

        return redirect()->route('item.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function storeType(Request $request)
    {
        $request->validate([
            'item_type' => 'required|string|max:255|unique:item_type,item_type',
        ]);

        ItemType::create($request->all());

        return redirect()->route('item.index')->with('success', 'Tipe Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $itemTypes = ItemType::all();

        return view('items.edit', compact('item', 'itemTypes'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'id_type' => 'required|exists:item_type,id_type',
            'item_name' => 'required|string|max:255|unique:item,item_name,' . $id . ',id_item',
            'total_stock' => 'required|numeric|min:0',
        ]);

        $item->update($request->all());

        return redirect()->route('item.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('item.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $items = Item::where('item_name', 'LIKE', "%{$query}%")
            ->with('itemType')
            ->get();

        return response()->json($items);
    }
}
