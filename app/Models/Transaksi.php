<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_transaksi', 'obat_id', 'jumlah', 'total_harga', 'tanggal_transaksi'];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
