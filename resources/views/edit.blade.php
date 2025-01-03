<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Barlow', sans-serif;
            font-size: 20px;
            font-weight: medium;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .btn {
            margin-right: 0.5rem;
        }
        .card {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="container">
            <h1 class="text-center mb-5 fw-semibold">Ubah Produk</h1>
            <div class="card">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group fw-medium">
                        <label for="nama">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" value="{{ $produk->nama }}" required>
                    </div>
                    <div class="form-group fw-medium">
                        <label for="harga">Harga Produk</label>
                        <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}" required>
                    </div>
                    </div>
                    <div class="form-group fw-medium">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" width="200" class="mt-2">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
