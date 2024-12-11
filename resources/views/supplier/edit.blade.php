@extends('layouts.master')

@section('title', 'Edit Supplier')

@section('content')
<div class="container-fluid">
    <h1>Edit Supplier</h1>

    <form action="{{ route('supplier.update', $supplier->id_suppliers) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="supplierName">Nama Supplier</label>
            <input type="text" class="form-control" id="supplierName" name="suppliers" value="{{ $supplier->suppliers }}" required>
        </div>
        <div class="form-group">
            <label for="supplierContact">Kontak</label>
            <input type="text" class="form-control" id="supplierContact" name="contact" value="{{ $supplier->contact }}" required>
        </div>
        <div class="form-group">
            <label for="supplierAddress">Alamat</label>
            <input type="text" class="form-control" id="supplierAddress" name="suppliers_address" value="{{ $supplier->suppliers_address }}" required>
        </div>
        <div class="modal-footer">
            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
