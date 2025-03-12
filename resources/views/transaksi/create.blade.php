@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Transaksi</h2>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Jenis Transaksi</label>
                <select name="jenis_transaksi" class="form-control">
                    <option value="pembelian">Pembelian</option>
                    <option value="penjualan">Penjualan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Obat</label>
                <select name="obat_id" class="form-control">
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id }}">{{ $obat->nama_obat }} (Stok: {{ $obat->stok }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
