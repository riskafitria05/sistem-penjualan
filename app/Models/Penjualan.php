<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Penjualan extends Model
{
    protected $fillable = [
        'produk_id',
        'tanggal',
        'jumlah',
        'harga_jual',
        'total',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
