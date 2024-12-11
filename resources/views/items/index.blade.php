@extends('layouts.master')

@section('title', 'Daftar Barang')

@section('content')
<div class="container-fluid">
    <h1>Daftar Barang</h1>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary ms-2" data-toggle="modal" data-target="#tambahBarangModal">
                        <i class="fas fa-plus"></i> Tambah Barang Baru
                    </button>

                    <button class="btn btn-secondary" data-toggle="modal" data-target="#tambahTipeBarangModal">
                        <i class="fas fa-plus"></i> Tambah Tipe Barang Baru
                    </button>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('item.search') }}" method="GET" class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Cari barang..." required>
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tipe Barang</th>
                        <th>Total Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->itemType->item_type }}</td>
                        <td>{{ $item->total_stock }}</td>
                        <td>
                            <a href="{{ route('item.edit', $item->id_item) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('item.destroy', $item->id_item) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahBarangModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang Baru</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('item.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="itemType">Tipe Barang</label>
                        <select class="form-control" id="itemType" name="id_type" required>
                            @foreach($itemTypes as $type)
                            <option value="{{ $type->id_type }}">{{ $type->item_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemName">Nama Barang</label>
                        <input type="text" class="form-control" id="itemName" name="item_name" required>
                    </div>
                    <div class="form-group">
                        <label for="totalStock">Total Stok</label>
                        <input type="number" class="form-control" id="totalStock" name="total_stock" required min="0">
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

<div class="modal fade" id="tambahTipeBarangModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tipe Barang Baru</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('item-type.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="itemTypeName">Nama Tipe Barang</label>
                        <input type="text" class="form-control" id="itemTypeName" name="item_type" required>
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
