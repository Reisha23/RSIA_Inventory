@extends('layouts.master')

@section('title', 'Edit Barang Masuk')

@section('content')
<div class="container-fluid">
    <h1>Edit Barang Masuk</h1>

    <form action="{{ route('barang-masuk.update', $incomingItem->id_incoming) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="incomingDate">Tanggal Masuk</label>
            <input type="date" class="form-control @error('incoming_date') is-invalid @enderror" id="incomingDate" name="incoming_date" value="{{ old('incoming_date', $incomingItem->incoming_date) }}" required>
            @error('incoming_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="itemSelect">Nama Barang</label>
            <select class="form-control @error('item_id_item') is-invalid @enderror" id="itemSelect" name="item_id_item" required>
                @foreach($items as $item)
                <option value="{{ $item->id_item }}" {{ old('item_id_item', $incomingItem->item_id_item) == $item->id_item ? 'selected' : '' }}>{{ $item->item_name }}</option>
                @endforeach
            </select>
            @error('item_id_item')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="totalIncoming">Total Masuk</label>
            <input type="number" class="form-control @error('total_incoming') is-invalid @enderror" id="totalIncoming" name="total_incoming" value="{{ old('total_incoming', $incomingItem->total_incoming) }}" required>
            @error('total_incoming')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
