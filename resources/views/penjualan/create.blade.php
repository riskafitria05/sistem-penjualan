
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>

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
            max-width: 600px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
        }

        label {
            display: block;
            margin-top: 16px;
        }

        input, select {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }

        button, .back {
            display: inline-block;
            padding: 11px 16px;
            margin-top: 20px;
            border: 0;
            border-radius: 6px;
            background: #1d4ed8;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .error {
            color: #dc2626;
        }
    </style>
</head>
<body>

<header>
    <h1>Sistem Informasi Penjualan</h1>
</header>

<main>
    <h2>Tambah Transaksi Penjualan</h2>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if ($produks->isEmpty())
        <p>Belum ada produk. Tambahkan produk terlebih dahulu.</p>
        <a class="back" href="{{ route('produk.create') }}">
            Tambah Produk
        </a>
    @else
        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf

            <label>Produk</label>
            <select name="produk_id" required>
                <option value="">-- Pilih Produk --</option>

                @foreach ($produks as $produk)
                    <option
                        value="{{ $produk->id }}"
                        {{ old('produk_id') == $produk->id ? 'selected' : '' }}
                    >
                        {{ $produk->nama_produk }}
                        — Stok: {{ $produk->stok }}
                    </option>
                @endforeach
            </select>

            <label>Tanggal Penjualan</label>
            <input
                type="date"
                name="tanggal"
                value="{{ old('tanggal', date('Y-m-d')) }}"
                required
            >

            <label>Jumlah Terjual</label>
            <input
                type="number"
                name="jumlah"
                min="1"
                value="{{ old('jumlah', 1) }}"
                required
            >

            <button type="submit">Simpan Transaksi</button>

            <a class="back" href="{{ route('penjualan.index') }}">
                Kembali
            </a>
        </form>
    @endif
</main>

</body>
</html>
