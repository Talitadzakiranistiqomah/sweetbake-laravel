<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('home', compact('recipes'));
    }

    public function create()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }
        return view('create'); // Sesuaikan nama file view form tambah resep aslimu (misal: recipes.create atau create)
    }

    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }

        // Simpan data resep & foto seperti semula
        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }

        Recipe::create([
        'name' => $request->judul,
        'deskripsi' => $request->description,
            'bahan' => $request->bahan,
            'langkah' => $request->langkah,
            'image' => $imagePath,
        ]);

        return redirect('/home');
    }

    public function destroy($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }

        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect('/home');
    }
}