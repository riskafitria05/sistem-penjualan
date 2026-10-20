
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 25px;
            color: #1e293b;
        }
        h1 { color: #1d4ed8; }
        .ringkasan {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .kartu, .tabel {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #0001;
        }
        .angka {
            font-size: 24px;
            font-weight: bold;
            color: #1d4ed8;
        }
        .tabel { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th { background: #dbeafe; }
        .tombol {
            display: inline-block;
            background: #1d4ed8;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <a href="{{ url('/') }}" class="tombol">Kembali ke Dashboard</a>

    <h1>Laporan Penjualan</h1>
    <p>Ringkasan transaksi penjualan produk.</p>

    <div class="ringkasan">
        <div class="kartu">
            <p>Total Transaksi</p>
            <div class="angka">{{ $totalTransaksi }}</div>
        </div>

        <div class="kartu">
            <p>Total Produk Terjual</p>
            <div class="angka">{{ $totalProdukTerjual }}</div>
        </div>

        <div class="kartu">
            <p>Total Pendapatan</p>
            <div class="angka">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="tabel">
        <h2>Riwayat Penjualan</h2>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Jual</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penjualan->tanggal }}</td>
                        <td>{{ $penjualan->produk->nama_produk ?? 'Produk tidak tersedia' }}</td>
                        <td>{{ $penjualan->jumlah }}</td>
                        <td>Rp {{ number_format($penjualan->harga_jual, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($penjualan->total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada transaksi penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
