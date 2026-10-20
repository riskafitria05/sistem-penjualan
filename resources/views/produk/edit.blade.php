
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>

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
            background: white;
            padding: 25px;
            border-radius: 12px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
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
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produk.update', $produk->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Kode Produk</label>
        <input
            type="text"
            name="kode_produk"
            value="{{ old('kode_produk', $produk->kode_produk) }}"
            required
        >

        <label>Nama Produk</label>
        <input
            type="text"
            name="nama_produk"
            value="{{ old('nama_produk', $produk->nama_produk) }}"
            required
        >

        <label>Kategori</label>
        <input
            type="text"
            name="kategori"
            value="{{ old('kategori', $produk->kategori) }}"
        >

        <label>Harga</label>
        <input
            type="number"
            name="harga"
            min="0"
            step="0.01"
            value="{{ old('harga', $produk->harga) }}"
            required
        >

        <label>Stok</label>
        <input
            type="number"
            name="stok"
            min="0"
            value="{{ old('stok', $produk->stok) }}"
            required
        >

        <button type="submit">Simpan Perubahan</button>

        <a class="back" href="{{ route('produk.index') }}">
            Kembali
        </a>
    </form>
</main>

</body>
</html>
