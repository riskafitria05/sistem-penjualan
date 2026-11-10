# 📦 Sistem Penjualan dan Prediksi Stok Produk

**Sistem Informasi Penjualan dan Prediksi Stok Produk Berbasis Web Menggunakan Laravel dengan Metode Moving Average**

Aplikasi berbasis web untuk mengelola data produk, transaksi penjualan, dan membantu memprediksi kebutuhan stok produk menggunakan metode **Moving Average**.

## Fitur Aplikasi

- Login pengguna
- Dashboard sistem penjualan
- Pengelolaan data produk (CRUD)
- Transaksi penjualan
- Pengurangan stok otomatis setelah transaksi
- Prediksi stok produk menggunakan metode Moving Average

## Teknologi yang Digunakan

- Laravel 12
- PHP
- MySQL
- HTML dan CSS
- XAMPP
- Visual Studio Code

## Metode yang Digunakan

**Moving Average**

Metode Moving Average digunakan untuk menghitung prediksi berdasarkan rata-rata data penjualan dari beberapa periode sebelumnya.

## Cara Menjalankan Aplikasi

1. Clone repository:

   `git clone https://github.com/riskafitria05/sistem-penjualan.git`

2. Masuk ke folder project:

   `cd sistem-penjualan`

3. Install dependency:

   `composer install`

4. Salin file konfigurasi:

   `cp .env.example .env`

5. Buat application key:

   `php artisan key:generate`

6. Atur koneksi database MySQL pada file `.env`.

7. Jalankan migration:

   `php artisan migrate`

8. Jalankan aplikasi:

   `php artisan serve`

## Tujuan Proyek

Proyek ini dibuat untuk memenuhi tugas Proyek Perangkat Lunak menggunakan framework Laravel dengan penerapan metode Moving Average untuk prediksi stok produk.
