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
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #db2777;
            margin-bottom: 30px;
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
        
        .delete-form {
            flex: 1;
            display: flex;
        }
        .delete-form button {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Katalog Resep SweetBake</h1>
        
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
    </div>
</body>
</html>