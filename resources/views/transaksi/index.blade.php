@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Transaksi</h2>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Obat</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucfirst($transaksi->jenis_transaksi) }}</td>
                        <td>{{ $transaksi->obat->nama_obat }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>Rp {{ number_format($transaksi->total_harga, 2, ',', '.') }}</td>
                        <td>{{ $transaksi->tanggal_transaksi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
