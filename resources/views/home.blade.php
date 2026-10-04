<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetBake</title>
    <!-- Pastikan file CSS kamu terhubung di sini -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR ATAS -->
    <nav class="navbar">
        <div class="logo">🍰 SweetBake</div>
        <div class="menu">
            <a href="/home">Home</a>
            <a href="#resep">Resep</a>
            
            <!-- Logika Navbar Dinamis -->
            @if(auth()->check())
                <a href="/logout" class="btn-login">Logout</a>
            @else
                <a href="/login" class="btn-login">Login Admin</a>
            @endif
        </div>
    </nav>

    <!-- BAGIAN HERO (WELCOME) -->
    <section class="hero">
        <div class="hero-content">
            <p class="welcome-text">WELCOME TO SWEETBAKE, TALITA DZAKIRAN ISTIQOMAH ✨</p>
            <h1>Temukan resep<br>kue <span>favoritmu.</span></h1>
            <p>Jelajahi berbagai resep kue sederhana, lezat, dan mudah dibuat di rumah ala Dapur Talita.</p>
            <a href="#resep" class="btn-explore">Jelajahi Resep &rarr;</a>
        </div>
    </section>

    <!-- BAGIAN KOLEKSI RESEP -->
    <section id="resep" class="collection">
        <div class="collection-header">
            <div>
                <p class="subtitle">OUR COLLECTION</p>
                <h2>Resep pilihan untukmu</h2>
            </div>
            <div class="search-box">
                <input type="text" placeholder="🔍 Cari resep kue...">
            </div>
        </div>

        <!-- TOMBOL TAMBAH RESEP (HANYA MUNCUL JIKA LOGIN SEBAGAI ADMIN) -->
        @if(auth()->check() && auth()->user()->role == 'admin')
            <div class="admin-add-button" style="margin: 20px 0;">
                <a href="/recipes/create" class="btn-tambah">+ Tambah Resep Baru</a>
            </div>
        @endif

        <!-- DAFTAR KARTU RESEP -->
        <div class="recipe-container">
            @forelse($recipes as $index => $recipe)
                <div class="recipe-card" data-name="{{ strtolower($recipe->judul ?? '') }}">
                    
                    <!-- Isi Konten Resep (Sesuaikan dengan aslimu) -->
                    <h3>{{ $recipe->judul }}</h3>
                    <p>{{ $recipe->deskripsi }}</p>

                    <!-- TOMBOL EDIT & HAPUS (HANYA MUNCUL JIKA LOGIN SEBAGAI ADMIN) -->
                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <div class="admin-actions" style="margin-top: 15px;">
                            <a href="/recipes/{{ $recipe->id }}/edit" class="btn-edit">Edit</a>
                            
                            <form action="/recipes/{{ $recipe->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus resep ini?')">Hapus</button>
                            </form>
                        </div>
                    @endif

                </div>
            @empty
                <!-- TAMPILAN JIKA DATABASE KOSONG -->
                <p class="empty-state" style="text-align: center; color: #888;">Belum ada resep yang ditambahkan.</p>
            @endforelse
        </div>
    </section>

</body>
</html>