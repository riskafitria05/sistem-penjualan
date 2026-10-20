<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('produk')
            ->latest('tanggal')
            ->get();

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $produks = Produk::orderBy('nama_produk')->get();

        return view('penjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        if ($request->jumlah > $produk->stok) {
            return back()
                ->withInput()
                ->withErrors([
                    'jumlah' => 'Jumlah penjualan melebihi stok tersedia.',
                ]);
        }

        $harga = $produk->harga;
        $total = $harga * $request->jumlah;

        Penjualan::create([
            'produk_id' => $produk->id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'harga_jual' => $harga,
            'total' => $total,
        ]);

        $produk->decrement('stok', $request->jumlah);

        return redirect()->route('penjualan.index')
            ->with('success', 'Transaksi berhasil disimpan!');
    }
}
