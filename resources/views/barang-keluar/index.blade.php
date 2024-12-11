@extends('layouts.master')

@section('title', 'Barang Keluar')

@section('content')
<div class="container-fluid">
    <h1>Barang Keluar</h1>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangKeluarModal">
                Tambah Barang Keluar
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Keluar</th>
                        <th>Nama Barang</th>
                        <th>Total Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->out_date }}</td>
                        <td>{{ $item->item->item_name }}</td>
                        <td>{{ $item->total_out }}</td>
                        <td>
                            <a href="{{ route('barang-keluar.edit', $item->id_out) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('barang-keluar.destroy', $item->id_out) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang keluar ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Barang Keluar -->
<div class="modal fade" id="tambahBarangKeluarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('barang-keluar.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="outDate">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="outDate" name="out_date" required>
                    </div>
                    <div class="form-group">
                        <label for="itemSelect">Nama Barang</label>
                        <select class="form-control" id="itemSelect" name="item_id_item" required>
                            @foreach($items as $item)
                            <option value="{{ $item->id_item }}">{{ $item->item_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="totalOut">Total Keluar</label>
                        <input type="number" class="form-control" id="totalOut" name="total_out" required>
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
