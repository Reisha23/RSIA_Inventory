@extends('layouts.master')

@section('title', 'Barang Masuk')

@section('content')
<div class="container-fluid">
    <h1>Barang Masuk</h1>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangMasukModal">
                Tambah Barang Masuk
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Barang</th>
                        <th>Total Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomingItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->incoming_date }}</td>
                        <td>{{ $item->item->item_name }}</td>
                        <td>{{ $item->total_incoming }}</td>
                        <td>
                            <a href="{{ route('barang-masuk.edit', $item->id_incoming) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('barang-masuk.destroy', $item->id_incoming) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang masuk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Barang Masuk -->
<div class="modal fade" id="tambahBarangMasukModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('barang-masuk.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="incomingDate">Tanggal Masuk</label>
                        <input type="date" class="form-control @error('incoming_date') is-invalid @enderror" id="incomingDate" name="incoming_date" value="{{ old('incoming_date') }}" required>
                        @error('incoming_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="itemSelect">Nama Barang</label>
                        <select class="form-control @error('item_id_item') is-invalid @enderror" id="itemSelect" name="item_id_item" required>
                            @foreach($items as $item)
                            <option value="{{ $item->id_item }}" {{ old('item_id_item') == $item->id_item ? 'selected' : '' }}>{{ $item->item_name }}</option>
                            @endforeach
                        </select>
                        @error('item_id_item')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="totalIncoming">Total Masuk</label>
                        <input type="number" class="form-control @error('total_incoming') is-invalid @enderror" id="totalIncoming" name="total_incoming" value="{{ old('total_incoming') }}" required>
                        @error('total_incoming')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
