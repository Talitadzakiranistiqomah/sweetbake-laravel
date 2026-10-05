<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->name }} - SweetBake</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fdf2f8;
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
        .nav-links a { text-decoration: none; color: #d88989; font-weight: 500; }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #ec4899;
            text-decoration: none;
            font-weight: bold;
        }
        .recipe-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .recipe-title {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            color: #382525;
            margin: 0 0 10px 0;
        }
        .recipe-meta {
            display: flex;
            justify-content: center;
            gap: 20px;
            color: #7a6b6b;
            font-size: 14px;
        }
        .recipe-meta span {
            background: #fdf2f8;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 500;
        }
        .recipe-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 30px;
        }
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #db2777;
            border-bottom: 2px solid #fdf2f8;
            padding-bottom: 10px;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .content-box {
            background: #fffafa;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #fce7f3;
            line-height: 1.8;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    
    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/home" class="logo">🍰 SweetBake</a>
        <div class="nav-links">
            <a href="/home">Home</a>
        </div>
    </nav>

    <div class="container">
        <a href="/home" class="back-btn">&larr; Kembali ke Katalog</a>

        <div class="recipe-header">
            <h1 class="recipe-title">{{ $recipe->name }}</h1>
            <div class="recipe-meta">
                <span>📂 {{ $recipe->category }}</span>
                <span>⏱ {{ $recipe->time }}</span>
                <span>✦ {{ $recipe->difficulty }}</span>
            </div>
        </div>

        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="recipe-image">

        <p style="font-size: 16px; color: #555; text-align: center; font-style: italic; margin-bottom: 40px;">
            "{{ $recipe->description }}"
        </p>

        <h3 class="section-title">Alat yang Dibutuhkan</h3>
        <div class="content-box">{{ $recipe->tools }}</div>

        <h3 class="section-title">Bahan-bahan</h3>
        <div class="content-box">{{ $recipe->ingredients }}</div>

        <h3 class="section-title">Langkah-langkah Pembuatan</h3>
        <div class="content-box">{{ $recipe->steps }}</div>
    </div>
</body>
</html>