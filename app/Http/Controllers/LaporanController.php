<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;

class LaporanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('produk')
            ->orderByDesc('tanggal')
            ->get();

        $totalTransaksi = $penjualans->count();
        $totalProdukTerjual = $penjualans->sum('jumlah');
        $totalPendapatan = $penjualans->sum('total');

        return view('laporan.index', compact(
            'penjualans',
            'totalTransaksi',
            'totalProdukTerjual',
            'totalPendapatan'
        ));
    }
}
