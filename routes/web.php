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
    $username = request('username');
    $password = request('password');

    if ($username === 'talita' && $password === '12345') {
        session(['login' => true, 'username' => $username]);
        return redirect('/home');
    }

    return back()->with('error', 'Username atau password salah!');
});

Route::get('/logout', function () {
    session()->flush();
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