@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Obat</h2>
        <form action="{{ route('obat.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Expired Date</label>
                <input type="date" name="expired_at" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <select name="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
