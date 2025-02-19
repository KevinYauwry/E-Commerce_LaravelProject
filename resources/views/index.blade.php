<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ADBBDA;
            font-family: 'Roboto', sans-serif;
        }
        .card {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.7);
        }
        .card-title, .card-text {
            text-align: center;
        }
        .card-body {
            text-align: center;
        }
        .btn-tambah-produk {
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }
        .btn-tambah-produk span {
            font-size: 24px;
        }
        .btn-tambah-produk .ms-2 {
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="container">
            <h3 class="text-center mb-2">TOKO ELEKTRONIK</h3>
            <h1 class="text-center mb-5 fw-bold">Digital Dynasty</h1>
            <a href="{{ route('produk.create') }}" class="btn btn-success mb-3 btn-tambah-produk mb-4">
                <span class="fw-bold">+</span>
                <span class="fw-bold ms-2">Tambah Produk</span> 
            </a>
            <form action="/sesi/logout" method="POST" class="text-center mb-4">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

            <div class="row justify-content-center">
                @foreach($produks as $produk)
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}" 
                        style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $produk->nama }}</h5>
                            <p class="card-text">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning mb-2">Ubah</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $produks->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</body>
</html>