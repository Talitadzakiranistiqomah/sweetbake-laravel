<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetBake - Katalog Resep</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="home-body">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">
            🍰 Sweet<span>Bake</span>
        </div>
        <div class="nav-menu">
            <a href="/home" class="active">Home</a>
            <a href="#recipes">Resep</a>
            
            @if(session('login'))
                <!-- Tombol ini hanya muncul kalau kamu (Admin) sudah login -->
                <a href="/recipes/create" style="color: #d98989; font-weight: bold;">+ Tambah Resep</a>
                <span class="user-name">👋 {{ session('username') }}</span>
                <a href="/logout" class="logout-btn">Logout</a>
            @else
                <!-- Pengunjung biasa hanya melihat tombol Login Admin -->
                <a href="/" class="logout-btn">Login Admin</a>
            @endif

        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-text">
            <p class="small-title">WELCOME TO SWEETBAKE, TALITA DZAKIRAN ISTIQOMAH ✨</p>
            <h1>
                Temukan resep kue
                <span>favoritmu.</span>
            </h1>
            <p class="hero-description">
                Jelajahi berbagai resep kue sederhana, lezat, dan mudah dibuat di rumah ala Dapur Talita.
            </p>
            <a href="#recipes" class="hero-button">Jelajahi Resep →</a>
        </div>
        <div class="hero-decoration">
            <img src="https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Delicious Cake" class="hero-image-modern">
        </div>
    </section>

    <!-- SEARCH -->
    <section class="search-section">
        <div>
            <p class="section-label">OUR COLLECTION</p>
            <h2>Resep pilihan untukmu</h2>
        </div>
        @if(auth()->check() && auth()->user()->role == 'admin')
    <div style="margin: 20px 0;">
        <a href="/recipes/create" class="btn-tambah">+ Tambah Resep Baru</a>
    </div>
@endif
        <div class="search-box">
            🔎
            <input type="text" id="searchInput" placeholder="Cari resep kue...">
        </div>
    </section>

    <!-- RECIPE -->
    <section class="recipe-section" id="recipes">
        <div class="recipe-grid" id="recipeGrid">
            
            @forelse($recipes as $index => $recipe)
                <div class="recipe-card" data-name="{{ strtolower($recipe->name) }}">
                    <div class="recipe-image">
                        <img src="{{ Str::startsWith($recipe->image, 'http') ? $recipe->image : asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="recipe-real-img">
                        <span class="category-badge">{{ $recipe->category }}</span>
                    </div>
                    <div class="recipe-content">
                        <h3>{{ $recipe->name }}</h3>
                        <p>{{ Str::limit($recipe->description, 80) }}</p>
                        
                        <div class="recipe-info">
                            <span>⏱ {{ $recipe->time }}</span>
                            <span>✦ {{ $recipe->difficulty }}</span>
                        </div>
                        
                        <div style="display: flex; gap: 10px;">
                            
                            <!-- Tombol Lihat selalu muncul untuk semua orang -->
                            <button class="recipe-button" onclick="showRecipe({{ $index }})" style="flex: 1; padding: 10px;">
                                Lihat
                            </button>
                           @if(auth()->check() && auth()->user()->role == 'admin')
    <!-- Tombol Edit Asli -->
    <a href="/recipes/{{ $recipe->id }}/edit" class="btn-edit">Edit</a>
    
    <!-- Tombol Hapus Asli -->
    <form action="/recipes/{{ $recipe->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus resep ini?')">Hapus</button>
    </form>
@endif

                        </div>

                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 50px; color: #927e7e;">
                    <h3>Belum ada resep yang ditambahkan.</h3>
                </div>
            @endforelse

        </div>
        <p id="noResult" class="no-result">Resep tidak ditemukan 😭</p>
    </section>

    <!-- MODAL DETAIL RESEP -->
    <div class="modal" id="recipeModal">
        <div class="modal-content">
            <button class="close-modal" onclick="closeRecipe()">×</button>
            <img src="" id="modalImage" class="modal-real-img" alt="Recipe Image">
            <p class="section-label">RECIPE DETAILS</p>
            <h2 id="modalTitle">Nama Kue</h2>
            <p class="modal-description" id="modalDescription"></p>

            <div class="recipe-detail-grid">
                <div>
                    <h3>🥣 Bahan-bahan</h3>
                    <ul id="modalIngredients"></ul>
                </div>
                <div>
                    <h3>🔧 Alat-alat</h3>
                    <ul id="modalTools"></ul>
                </div>
            </div>

            <div class="tutorial">
                <h3>👩‍🍳 Tutorial</h3>
                <ol id="modalSteps"></ol>
            </div>
        </div>
    </div>

    <!-- DATA RESEP DARI LARAVEL -->
    <script>
        const recipes = @json($recipes);
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>