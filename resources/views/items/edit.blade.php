@extends('layouts.master')

@section('title', 'Edit Barang')

@section('content')
<div class="container-fluid">
    <h1>Edit Barang</h1>

    <form action="{{ route('item.update', $item->id_item) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="editItemType">Tipe Barang</label>
            <select class="form-control" id="editItemType" name="id_type" required>
                @foreach($itemTypes as $type)
                <option value="{{ $type->id_type }}" {{ $type->id_type == $item->id_type ? 'selected' : '' }}>
                    {{ $type->item_type }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="editItemName">Nama Barang</label>
            <input type="text" class="form-control" id="editItemName" name="item_name" value="{{ $item->item_name }}" required>
        </div>
        <div class="form-group">
            <label for="editTotalStock">Total Stok</label>
            <input type="number" class="form-control" id="editTotalStock" name="total_stock" value="{{ $item->total_stock }}" required min="0">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
