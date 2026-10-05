<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SweetBake</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fdf2f8;
            margin: 0;
            /* Padding atas dihapus agar header nempel di ujung layar */
        }

        /* --- STYLING UNTUK COVER / NAVBAR ATAS --- */
        .navbar {
            background-color: #ffffff;
            padding: 15px 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        .navbar-brand {
            font-size: 26px;
            font-weight: 800;
            color: #4a2c2a; /* Warna cokelat gelap */
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .navbar-brand span.pink {
            color: #db2777;
        }
        .navbar-brand span.brown {
            color: #e09f8e; /* Warna cokelat muda kemerahan */
        }
        /* ----------------------------------------- */

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 40px 20px;
        }
        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }
        h1 {
            color: #db2777;
            margin-bottom: 15px;
        }
        .btn-tambah {
            display: inline-block;
            background-color: #ec4899;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(236, 72, 153, 0.3);
            transition: background-color 0.3s;
        }
        .btn-tambah:hover {
            background-color: #db2777;
        }
        .empty-state {
            text-align: center;
            color: #6b7280;
            padding: 50px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .recipe-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }
        .recipe-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .recipe-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .recipe-title {
            font-size: 22px;
            color: #333;
            margin: 0 0 10px 0;
        }
        .recipe-desc {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .recipe-meta {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }
        .btn {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border: none;
            color: white;
        }
        .btn-lihat { background-color: #d6838d; }
        .btn-edit { background-color: #fbbf24; }
        .btn-hapus { background-color: #ef4444; }
        .delete-form { flex: 1; display: flex; }
        .delete-form button { width: 100%; }
    </style>
</head>
<body>
    
    <!-- COVER / NAVBAR ATAS -->
    <div class="navbar">
        <a href="/home" class="navbar-brand">
            🍰 <span class="pink">Sweet</span><span class="brown">Bake</span>
        </a>
    </div>

    <div class="container">
        <div class="header-section">
            <h1>Katalog Resep SweetBake</h1>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="/recipes/create" class="btn-tambah">+ Tambah Resep Baru</a>
            @endif
        </div>
        
        @if($recipes->isEmpty())
            <div class="empty-state">
                <h3>Belum ada resep di katalog 🍰</h3>
                <p>Klik tombol di atas untuk mulai membagikan resep andalanmu!</p>
            </div>
        @else
            <div class="recipe-grid">
                @foreach($recipes as $recipe)
                <div class="recipe-card">
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}">
                    <div class="recipe-content">
                        <h3 class="recipe-title">{{ $recipe->name }}</h3>
                        <p class="recipe-desc">{{ Str::limit($recipe->description, 50) }}</p>
                        
                        <div class="recipe-meta">
                            <span>⏱ {{ $recipe->time }}</span>
                            <span>✦ {{ $recipe->difficulty }}</span>
                        </div>

                        <div class="action-buttons">
                            <a href="/recipes/{{ $recipe->id }}" class="btn btn-lihat">Lihat</a>
                            
                            @if(auth()->check() && auth()->user()->role === 'admin')
                            <a href="/recipes/{{ $recipe->id }}/edit" class="btn btn-edit">Edit</a>
                            
                            <form action="/recipes/{{ $recipe->id }}" method="POST" class="delete-form" onsubmit="return confirm('Yakin ingin menghapus resep ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus">Hapus</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>