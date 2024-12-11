@extends('layouts.master')

@section('title', 'Daftar Supplier')

@section('content')
<div class="container-fluid">
    <h1>Daftar Supplier</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahSupplierModal">
                Tambah Supplier Baru
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $supplier->suppliers }}</td>
                        <td>{{ $supplier->contact }}</td>
                        <td>{{ $supplier->suppliers_address }}</td>
                        <td>
                            <a href="{{ route('supplier.edit', $supplier->id_suppliers) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('supplier.destroy', $supplier->id_suppliers) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Supplier -->
<div class="modal fade" id="tambahSupplierModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Supplier Baru</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                 <div class="modal-body">
                    <div class="form-group">
                        <label for="supplierName">Nama Supplier</label>
                        <input type="text" class="form-control" id="supplierName" name="suppliers" required>
                    </div>
                    <div class="form-group">
                        <label for="supplierContact">Kontak</label>
                        <input type="text" class="form-control" id="supplierContact" name="contact" required>
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress">Alamat</label>
                        <input type="text" class="form-control" id="supplierAddress" name="suppliers_address" required>
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
