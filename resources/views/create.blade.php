<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
</head>
<body class="home-body">
    <div class="form-container">
        <h2>Tambah Resep Baru</h2>
        <form action="/recipes" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>Nama Kue</label>
                <input type="text" name="name" required placeholder="Contoh: Fudgy Brownies">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="category" required placeholder="Contoh: Kue Cokelat">
            </div>

            <div class="form-group">
                <label>Waktu Pembuatan</label>
                <input type="text" name="time" required placeholder="Contoh: 45 Menit">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="3" required placeholder="Masukkan deskripsi"></textarea>
            </div>

            <div class="form-group">
                <label>Bahan-bahan</label>
                <textarea name="bahan" rows="4" required placeholder="Masukkan bahan"></textarea>
            </div>

            <div class="form-group">
                <label>Langkah-langkah</label>
                <textarea name="langkah" rows="4" required placeholder="Masukkan langkah pembuatan"></textarea>
            </div>

            <div class="form-group">
                <label>Upload Gambar Kue</label>
                <input type="file" name="image" accept="image/*" required>
            </div>

            <button type="submit" style="margin-top: 15px;">Simpan Resep</button>
        </form>
    </div>
</body>
</html>