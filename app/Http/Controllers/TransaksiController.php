<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Obat;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('obat')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $obats = Obat::all();
        return view('transaksi.create', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required',
            'obat_id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->obat_id);
        $harga_satuan = ($request->jenis_transaksi == 'pembelian') ? $obat->harga_beli : $obat->harga_jual;
        $total_harga = $request->jumlah * $harga_satuan;

        if ($request->jenis_transaksi == 'penjualan' && $obat->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk transaksi penjualan');
        }

        Transaksi::create([
            'jenis_transaksi' => $request->jenis_transaksi,
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        // Update stok obat
        if ($request->jenis_transaksi == 'pembelian') {
            $obat->increment('stok', $request->jumlah);
        } else {
            $obat->decrement('stok', $request->jumlah);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }
}
