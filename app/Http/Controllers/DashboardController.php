<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Supplier;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();
        $totalSupplier = Supplier::count();
        $totalTransaksi = Transaksi::count();

        // Ambil transaksi per bulan (untuk grafik)
        $penjualanBulanan = Transaksi::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Obat yang hampir habis (stok < 10)
        $obatHampirHabis = Obat::where('stok', '<', 10)->get();

        // Obat yang akan kedaluwarsa dalam 30 hari
        $obatKadaluarsa = Obat::where('expired_at', '<=', Carbon::now()->addDays(30))->get();

        return view('dashboard', compact('totalObat', 'totalSupplier', 'totalTransaksi', 'penjualanBulanan', 'obatHampirHabis', 'obatKadaluarsa'));
    }
}
