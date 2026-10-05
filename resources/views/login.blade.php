<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SweetBake by Talita</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdf2f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 25px;
        }
        .icon-box {
            background-color: #fce7f3;
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            margin-bottom: 15px;
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #3b2a2a;
            margin: 0;
        }
        .logo-text span {
            color: #d88989;
        }
        .subtitle {
            color: #7a6b6b;
            font-size: 14px;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            color: #3b2a2a;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #fbcfe8;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 14px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #f472b6;
            box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.2);
        }
        .btn-login {
            width: 100%;
            background-color: #382525;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: inherit;
        }
        .btn-login:hover {
            background-color: #2a1b1b;
        }
        .demo-box {
            margin-top: 25px;
            background-color: #fff9fb;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-size: 13px;
            color: #7a6b6b;
        }
        .demo-box .demo-title {
            color: #d88989;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 15px;
            text-align: center;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #d88989;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-container">
            <!-- Ikon ganti jadi koki, nama ganti jadi SweetBake by Talita -->
            <div class="icon-box">👩‍🍳</div>
            <h1 class="logo-text">Sweet<span>Bake</span></h1>
            <div style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #d88989; font-size: 14px; margin-top: -5px;">by Talita</div>
            <p class="subtitle" style="margin-top: 10px;">Masuk untuk menemukan resep hidangan favoritmu.</p>
        </div>

        @if($errors->any())
            <div class="error-message">Email atau password salah!</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <!-- Menjaga placeholder sesuai aslinya -->
                <input type="email" name="email" required placeholder="Masukkan email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <!-- Menjaga placeholder sesuai aslinya -->
                <input type="password" name="password" required placeholder="Masukkan password">
            </div>
            <!-- Nama di tombol ikut disesuaikan -->
            <button type="submit" class="btn-login">Masuk ke SweetBake &rarr;</button>
        </form>

        <!-- Kotak demo account sesuai screenshot aslimu -->
        <div class="demo-box">
            <div class="demo-title">Demo Account</div>
            email: talitadzakirani@gmail.com<br>
            Password: 12345
        </div>

        <a href="/home" class="back-link">&larr; Kembali ke Beranda</a>
    </div>
</body>
</html>