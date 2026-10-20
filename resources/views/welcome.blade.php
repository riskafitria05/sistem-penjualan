
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penjualan</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #1d4ed8;
            color: white;
            padding: 24px;
        }

        main {
            padding: 30px;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            display: block;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px #0001;
            text-decoration: none;
            color: #1e293b;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 5px 15px #0002;
            background: #eff6ff;
        }

        .card h3 {
            color: #1d4ed8;
            margin-top: 0;
        }

        .card p {
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <header>
        <h1>Sistem Informasi Penjualan</h1>
        <p>Manajemen Produk dan Prediksi Stok dengan Moving Average</p>
    </header>

    <main>
        <h2>Dashboard</h2>
        <p>Selamat datang di aplikasi penjualan.</p>

        <div class="menu">
            <a href="{{ route('produk.index') }}" class="card">
                <h3>Data Produk</h3>
                <p>Kelola data dan stok produk.</p>
            </a>

            <a href="{{ route('penjualan.index') }}" class="card">
                <h3>Transaksi Penjualan</h3>
                <p>Catat transaksi penjualan produk.</p>
            </a>

            <a href="{{ route('prediksi.index') }}" class="card">
                <h3>Prediksi Stok</h3>
                <p>Prediksi kebutuhan stok menggunakan Moving Average.</p>
            </a>

            <a href="{{ route('laporan.index') }}" class="card">
    <h3>Laporan Penjualan</h3>
    <p>Lihat riwayat transaksi dan total pendapatan.</p>
            </a>
        </div>
    </main>
</body>
</html>
