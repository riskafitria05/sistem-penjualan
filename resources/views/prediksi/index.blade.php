
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Stok Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            color: #1e293b;
        }

        header {
            background: #1d4ed8;
            color: white;
            padding: 20px 30px;
        }

        main {
            padding: 25px;
            overflow-x: auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #1d4ed8;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-right: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #dbeafe;
        }

        .kurang {
            color: #dc2626;
            font-weight: bold;
        }

        .cukup {
            color: #15803d;
            font-weight: bold;
        }

        .catatan {
            margin-top: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<header>
    <h1>Sistem Informasi Penjualan</h1>
    <p>Prediksi Stok dengan Metode Moving Average</p>
</header>

<main>
    <h2>Hasil Prediksi Stok Produk</h2>

    <a class="btn" href="{{ url('/') }}">Dashboard</a>
    <a class="btn" href="{{ route('produk.index') }}">Data Produk</a>
    <a class="btn" href="{{ route('penjualan.index') }}">Transaksi Penjualan</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Penjualan Bulan 1</th>
                <th>Penjualan Bulan 2</th>
                <th>Penjualan Bulan 3</th>
                <th>Rata-rata</th>
                <th>Prediksi Bulan Berikutnya</th>
                <th>Stok Saat Ini</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($prediksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['produk']->nama_produk }}</td>
                    <td>{{ $item['bulan_1'] }}</td>
                    <td>{{ $item['bulan_2'] }}</td>
                    <td>{{ $item['bulan_3'] }}</td>
                    <td>{{ number_format($item['rata_rata'], 2, ',', '.') }}</td>
                    <td>{{ $item['prediksi'] }} unit</td>
                    <td>{{ $item['stok'] }} unit</td>
                    <td class="{{ $item['status'] == 'Stok Perlu Ditambah' ? 'kurang' : 'cukup' }}">
                        {{ $item['status'] }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="catatan">
        <strong>Metode:</strong> Moving Average 3 bulan.

        <p>Prediksi dihitung dari rata-rata jumlah penjualan tiga bulan penuh terakhir, kemudian dibulatkan ke atas.</p>

        <p><strong>Catatan:</strong> Hasil prediksi merupakan perkiraan penjualan, bukan otomatis jumlah stok yang harus dibeli.</p>
    </div>
</main>

</body>
</html>
