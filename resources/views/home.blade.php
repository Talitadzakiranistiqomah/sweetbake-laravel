<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetBake - Dapur Talita</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #ffffff, #fdf2f8);
            color: #3b2a2a;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #3b2a2a;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-links { display: flex; gap: 30px; align-items: center; }
        .nav-links a { text-decoration: none; color: #d88989; font-weight: 500; font-size: 15px; }
        .btn-login {
            background-color: #382525;
            color: white !important;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 80px 10%;
        }
        .hero-text { max-width: 50%; }
        .welcome-text {
            color: #d68f8f;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            line-height: 1.1;
            margin: 0 0 20px 0;
            color: #382525;
        }
        .hero-title span { color: #df9898; }
        .hero-desc {
            font-size: 15px;
            color: #7a6b6b;
            margin-bottom: 35px;
            line-height: 1.6;
        }
        .btn-explore {
            background-color: #382525;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }
        .hero-image {
            width: 380px;
            height: 380px;
            border-radius: 50%;
            border: 15px solid white;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .hero-image img { width: 100%; height: 100%; object-fit: cover; }

        .katalog-section { padding: 60px 10%; background: white; }
        .header-section { text-align: center; margin-bottom: 40px; }
        .btn-tambah {
            display: inline-block;
            background-color: #ec4899;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
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
            border: 1px solid #f3f4f6;
        }
        .recipe-card img { width: 100%; height: 220px; object-fit: cover; }
        .recipe-content { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
        .recipe-title { font-family: 'Playfair Display', serif; font-size: 24px; color: #333; margin: 0 0 10px 0; }
        .recipe-meta { font-size: 13px; color: #9ca3af; margin-bottom: 20px; display: flex; gap: 15px; }
        .action-buttons { display: flex; gap: 8px; margin-top: auto; }
        .btn { flex: 1; text-align: center; padding: 10px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: none; color: white; cursor: pointer;}
        .btn-lihat { background-color: #d6838d; }
        .btn-edit { background-color: #fbbf24; }
        .btn-hapus { background-color: #ef4444; }
        .delete-form { flex: 1; display: flex; }
        .delete-form button { width: 100%; }
        .empty-state { text-align: center; color: #6b7280; padding: 50px; background: #fdf2f8; border-radius: 12px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="/home" class="logo">🍰 SweetBake</a>
        <div class="nav-links">
            <a href="/home">Home</a>
            <a href="#katalog">Resep</a>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-login" style="border:none; cursor:pointer;">Logout</button>
                </form>
            @else
                <a href="/login" class="btn-login">Login Admin</a>
            @endif
        </div>
    </nav>

    <!-- BAGIAN TEKS YANG SUDAH DIREVISI -->
    <header class="hero">
        <div class="hero-text">
            <div class="welcome-text">WELCOME TO SWEETBAKE, TALITA DZAKIRAN ISTIQOMAH ✨</div>
            <h1 class="hero-title">Temukan resep<br>hidangan <span>favoritmu.</span></h1>
            <p class="hero-desc">Jelajahi berbagai inspirasi resep kue, dessert, makanan berat, hingga minuman lezat yang mudah dibuat di rumah ala Dapur Talita.</p>
            <a href="#katalog" class="btn-explore">Jelajahi Resep &rarr;</a>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Hidangan Lezat">
        </div>
    </header>

    <section class="katalog-section" id="katalog">
        <div class="header-section">
            <h2 style="font-family: 'Playfair Display', serif; font-size: 36px; color: #382525; margin-bottom: 15px;">Katalog Resep</h2>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="/recipes/create" class="btn-tambah">+ Tambah Resep Baru</a>
            @endif
        </div>
        
        @if(isset($recipes) && $recipes->isEmpty())
            <div class="empty-state">
                <h3>Belum ada resep di katalog 🍽️</h3>
                <p>Klik tombol di atas untuk mulai membagikan resep andalanmu!</p>
            </div>
        @elseif(isset($recipes))
            <div class="recipe-grid">
                @foreach($recipes as $recipe)
                <div class="recipe-card">
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}">
                    <div class="recipe-content">
                        <h3 class="recipe-title">{{ $recipe->name }}</h3>
                        <p style="color: #6b7280; font-size: 14px; margin-bottom: 15px;">{{ Str::limit($recipe->description, 50) }}</p>
                        
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
    </section>

</body>
</html>