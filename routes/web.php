<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('login');
});

Route::post('/login', function () {
    // 1. Ambil email dan password dari form login
    $credentials = request()->only('email', 'password');

    // 2. Cek ke database menggunakan sistem bawaan Laravel (Auth)
    if (auth()->attempt($credentials)) {
        // Jika cocok, buat sesi keamanan baru dan arahkan ke home
        request()->session()->regenerate();
        return redirect('/home');
    }

    // 3. Jika salah, kembalikan ke halaman login bawa pesan error
    return back()->with('error', 'Email atau password salah!');
});
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| RECIPE CRUD ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/home', [RecipeController::class, 'index']);
Route::get('/recipes/create', [RecipeController::class, 'create']);
Route::post('/recipes', [RecipeController::class, 'store']);
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy']);
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit']);
Route::put('/recipes/{id}', [RecipeController::class, 'update']);