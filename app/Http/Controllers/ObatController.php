<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Supplier;

class ObatController extends Controller
{
    // Menampilkan daftar obat
    public function index()
    {
        $obats = Obat::with('supplier')->get();
        return view('obat.index', compact('obats'));
    }

    // Menampilkan form tambah obat
    public function create()
    {
        $suppliers = Supplier::all();
        return view('obat.create', compact('suppliers'));
    }

    // Menyimpan data obat baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats',
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'expired_at' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    // Menampilkan form edit obat
    public function edit(Obat $obat)
    {
        $suppliers = Supplier::all();
        return view('obat.edit', compact('obat', 'suppliers'));
    }

    // Menyimpan perubahan data obat
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'expired_at' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui');
    }

    // Menghapus obat
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
