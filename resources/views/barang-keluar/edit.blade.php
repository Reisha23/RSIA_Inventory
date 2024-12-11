@extends('layouts.master')

@section('title', 'Edit Barang Keluar')

@section('content')
<div class="container-fluid">
    <h1>Edit Barang Keluar</h1>

    <form action="{{ route('barang-keluar.update', $outItem->id_out) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="outDate">Tanggal Keluar</label>
            <input type="date" class="form-control" id="outDate" name="out_date" value="{{ $outItem->out_date }}" required>
        </div>
        <div class="form-group">
            <label for="itemSelect">Nama Barang</label>
            <select class="form-control" id="itemSelect" name="item_id_item" required>
                @foreach($items as $item)
                <option value="{{ $item->id_item }}" {{ $item->id_item == $outItem->item_id_item ? 'selected' : '' }}>{{ $item->item_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="totalOut">Total Keluar</label>
            <input type="number" class="form-control" id="totalOut" name="total_out" value="{{ $outItem->total_out }}" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
