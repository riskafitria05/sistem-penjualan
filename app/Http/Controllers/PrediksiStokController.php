<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Carbon\Carbon;

class PrediksiStokController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('nama_produk')->get();

        $prediksi = [];

        $awalBulanIni = Carbon::now()->startOfMonth();
        $awalBulanLalu = $awalBulanIni->copy()->subMonth();

        foreach ($produks as $produk) {
            $penjualanBulanan = [];

            // Mengambil penjualan 3 bulan penuh terakhir
            for ($i = 3; $i >= 1; $i--) {
                $mulai = $awalBulanIni->copy()->subMonths($i);
                $selesai = $mulai->copy()->addMonth();

                $jumlah = Penjualan::where('produk_id', $produk->id)
                    ->where('tanggal', '>=', $mulai->toDateString())
                    ->where('tanggal', '<', $selesai->toDateString())
                    ->sum('jumlah');

                $penjualanBulanan[] = (int) $jumlah;
            }

            // Moving Average dari 3 bulan
            $rataRata = array_sum($penjualanBulanan) / 3;

            $prediksi[] = [
                'produk' => $produk,
                'bulan_1' => $penjualanBulanan[0],
                'bulan_2' => $penjualanBulanan[1],
                'bulan_3' => $penjualanBulanan[2],
                'rata_rata' => $rataRata,
                'prediksi' => (int) ceil($rataRata),
                'stok' => $produk->stok,
                'status' => $produk->stok < ceil($rataRata)
                    ? 'Stok Perlu Ditambah'
                    : 'Stok Mencukupi',
            ];
        }

        return view('prediksi.index', compact('prediksi'));
    }
}
