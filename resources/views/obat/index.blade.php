@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Obat</h2>
        <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Expired</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obats as $obat)
                    <tr>
                        <td>{{ $obat->kode_obat }}</td>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->kategori }}</td>
                        <td>{{ $obat->stok }}</td>
                        <td>Rp {{ number_format($obat->harga_jual, 0, ',', '.') }}</td>
                        <td>{{ $obat->expired_at }}</td>
                        <td>{{ $obat->supplier->nama_supplier }}</td>
                        <td>
                            <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
