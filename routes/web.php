<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produk', ProdukController::class);

Route::resource('penjualan', PenjualanController::class)
    ->only(['index', 'create', 'store']);
use App\Http\Controllers\PrediksiStokController;
Route::get('/prediksi-stok', [PrediksiStokController::class, 'index'])
    ->name('prediksi.index');
 Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');   