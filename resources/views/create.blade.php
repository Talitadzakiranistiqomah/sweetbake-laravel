<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep - SweetBake</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { max-width: 600px; margin: 40px auto; padding: 30px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(80, 40, 40, 0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; color: #493939; font-weight: bold; font-size: 14px; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #eadbd7; border-radius: 10px; font-family: inherit; }
        .form-group textarea { height: 100px; resize: vertical; }
        .btn-submit { width: 100%; padding: 14px; background: #342626; color: white; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background: #d98989; }
    </style>
</head>
<body class="home-body">
    <nav class="navbar">
        <div class="logo">🍰 Sweet<span>Bake</span></div>
        <div class="nav-menu">
            <a href="/home" style="color: #766666; font-weight: bold; text-decoration: none;">← Kembali ke Home</a>
        </div>
    </nav>

    <div class="form-container">
        <h2 style="font-family: Georgia; margin-bottom: 20px; color: #342626;">Tambah Resep Baru</h2>
        
        <form action="/recipes" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>Nama Kue</label>
                <input type="text" name="name" required placeholder="Contoh: Strawberry Cake">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="category" required placeholder="Contoh: Cake">
            </div>

            <div class="form-group">
                <label>Upload Gambar Kue</label>
                <input type="file" name="image" accept="image/*" required style="padding: 9px;">
            </div>

            <div class="form-group">
                <label>Waktu Pembuatan</label>
                <input type="text" name="time" required placeholder="Contoh: 60 menit">
            </div>

            <div class="form-group">
                <label>Tingkat Kesulitan</label>
                <input type="text" name="difficulty" required placeholder="Contoh: Mudah">
            </div>

            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="description" required placeholder="Kue lembut dengan rasa strawberry..."></textarea>
            </div>

            <div class="form-group">
                <label>Bahan-bahan (Tekan Enter untuk memisah bahan)</label>
                <textarea name="ingredients" required placeholder="250 gram tepung terigu&#10;150 gram gula pasir"></textarea>
            </div>

            <div class="form-group">
                <label>Alat (Tekan Enter untuk memisah alat)</label>
                <textarea name="tools" required placeholder="Mixer&#10;Oven"></textarea>
            </div>

            <div class="form-group">
                <label>Langkah-langkah (Tekan Enter untuk memisah langkah)</label>
                <textarea name="steps" required placeholder="Siapkan semua bahan.&#10;Kocok telur dan gula."></textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan Resep</button>
        </form>
    </div>
</body>
</html>