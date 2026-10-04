<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SweetBake</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

    <div class="login-card">
        <div class="login-logo">🍰</div>
        <h1>Sweet<span>Bake</span></h1>
        <p class="login-subtitle">Masuk untuk menemukan resep favoritmu.</p>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
            
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
            
            <button type="submit">Masuk ke SweetBake →</button>
        </form>

        <div class="demo-account">
            <strong>Demo Account</strong>
            <p>Username: talita</p>
            <p>Password: 12345</p>
        </div>
    </div>

</body>
</html>