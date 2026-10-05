<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep - SweetBake</title>
    <style>
        /* Desain sama persis seperti halaman create */
        body.home-body { font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #fdf2f8; padding: 40px 20px; color: #333; }
        .form-container { background: #ffffff; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .form-container h2 { text-align: center; color: #db2777; margin-bottom: 25px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 7px; font-weight: 600; color: #4b5563; }
        .form-group input[type="text"], .form-group select, .form-group textarea, .form-group input[type="file"] { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; font-family: inherit; }
        button[type="submit"] { width: 100%; background-color: #ec4899; color: white; border: none; padding: 14px; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body class="home-body">
    <div class="form-container">
        <h2>Edit Resep</h2>
        <!-- Menggunakan method PUT untuk update data -->
        <form action="/recipes/{{ $recipe->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nama Kue</label>
                <input type="text" name="name" value="{{ $recipe->name }}" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="category" value="{{ $recipe->category }}" required>
            </div>

            <div class="form-group">
                <label>Tingkat Kesulitan</label>
                <select name="difficulty" required>
                    <option value="Mudah" {{ $recipe->difficulty == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                    <option value="Sedang" {{ $recipe->difficulty == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="Sulit" {{ $recipe->difficulty == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                </select>
            </div>

            <div class="form-group">
                <label>Waktu Pembuatan</label>
                <input type="text" name="time" value="{{ $recipe->time }}" required>
            </div>
            
            <div class="form-group">
                <label>Alat-alat</label>
                <textarea name="tools" rows="3" required>{{ $recipe->tools }}</textarea>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="3" required>{{ $recipe->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Bahan-bahan</label>
                <textarea name="bahan" rows="4" required>{{ $recipe->ingredients }}</textarea>
            </div>

            <div class="form-group">
                <label>Langkah-langkah</label>
                <textarea name="langkah" rows="4" required>{{ $recipe->steps }}</textarea>
            </div>

            <div class="form-group">
                <label>Ganti Gambar (Opsional)</label>
                <input type="file" name="image" accept="image/*">
                <small style="color: gray;">Kosongkan jika tidak ingin mengganti gambar.</small>
            </div>

            <button type="submit">Update Resep</button>
        </form>
    </div>
</body>
</html>