<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pelanggan', 'no_hp', 'alamat'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
