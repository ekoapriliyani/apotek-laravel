@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Dashboard Admin</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Obat</h5>
                        <p class="card-text">{{ $totalObat }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Supplier</h5>
                        <p class="card-text">{{ $totalSupplier }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Transaksi</h5>
                        <p class="card-text">{{ $totalTransaksi }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Penjualan -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Grafik Penjualan Bulanan</h5>
                <canvas id="penjualanChart"></canvas>
            </div>
        </div>

        <!-- Obat Hampir Habis -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Obat Hampir Habis</h5>
                <ul>
                    @foreach ($obatHampirHabis as $obat)
                        <li>{{ $obat->nama_obat }} - Stok: {{ $obat->stok }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Obat Kadaluarsa -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Obat Akan Kedaluwarsa</h5>
                <ul>
                    @foreach ($obatKadaluarsa as $obat)
                        <li>{{ $obat->nama_obat }} - Exp: {{ $obat->expired_at }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('penjualanChart').getContext('2d');
        var penjualanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($penjualanBulanan->pluck('bulan')) !!},
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: {!! json_encode($penjualanBulanan->pluck('total')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
