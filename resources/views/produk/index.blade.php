
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f5f9; margin: 0; color: #1e293b; }
        header { background: #1d4ed8; color: white; padding: 20px 30px; }
        main { padding: 30px; }
        .btn { display: inline-block; padding: 10px 15px; background: #1d4ed8; color: white; text-decoration: none; border: 0; border-radius: 6px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #e2e8f0; text-align: left; }
        th { background: #dbeafe; }
        .success { background: #dcfce7; padding: 12px; margin: 15px 0; }
        .danger { background: #dc2626; }
        .actions { display: flex; gap: 8px; align-items: center; }
        @media(max-width: 700px) { main { padding: 12px; overflow-x: auto; } }
    </style>
</head>
<body>
<header>
    <h1>Sistem Informasi Penjualan</h1>
    <p>Manajemen Data Produk</p>
</header>

<main>
    <h2>Daftar Produk</h2>

    <a class="btn" href="{{ route('produk.create') }}">+ Tambah Produk</a>
    <a class="btn" href="{{ url('/') }}">Dashboard</a>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="success">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->kode_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori ?? '-' }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn" href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada produk. Silakan tambahkan produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</main>
</body>
</html>
