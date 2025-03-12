@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Obat</h2>
        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" class="form-control" value="{{ $obat->kode_obat }}" required>
            </div>
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $obat->kategori }}" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $obat->stok }}" required>
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" value="{{ $obat->harga_beli }}" required>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control" value="{{ $obat->harga_jual }}" required>
            </div>
            <div class="form-group">
                <label>Expired Date</label>
                <input type="date" name="expired_at" class="form-control" value="{{ $obat->expired_at }}" required>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <select name="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $obat->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->nama_supplier }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
