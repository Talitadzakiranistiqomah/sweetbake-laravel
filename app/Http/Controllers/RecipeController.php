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
        return view('create');
    }

    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }

        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }

        Recipe::create([
            'name' => $request->name,
            'category' => $request->category,
            'difficulty' => $request->difficulty,
            'time' => $request->time,
            'description' => $request->deskripsi,
            'ingredients' => $request->bahan,
            'steps' => $request->langkah,
            'image' => $imagePath,
        ]);

        return redirect('/home');
    }

    public function destroy($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }
        
        $recipe = Recipe::find($id);
        if ($recipe) {
            $recipe->delete();
        }
        
        return redirect('/home');
    }
}