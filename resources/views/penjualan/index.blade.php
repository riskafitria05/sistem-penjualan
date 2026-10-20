
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penjualan</title>

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
            border: 0;
            border-radius: 6px;
            cursor: pointer;
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

        .success {
            background: #dcfce7;
            padding: 12px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<header>
    <h1>Sistem Informasi Penjualan</h1>
    <p>Transaksi Penjualan</p>
</header>

<main>
    <h2>Daftar Transaksi</h2>

    <a class="btn" href="{{ route('penjualan.create') }}">
        + Tambah Transaksi
    </a>

    <a class="btn" href="{{ url('/') }}">
        Dashboard
    </a>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Produk</th>
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
                    <td>{{ $penjualan->produk->nama_produk ?? '-' }}</td>
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
</main>

</body>
</html>
