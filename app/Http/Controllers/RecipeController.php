<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        // Halaman Home dibiarkan terbuka untuk pengunjung publik (tanpa login)
        $recipes = Recipe::all();
        return view('home', compact('recipes'));
    }

    public function create()
    {
        if (!session('login')) return redirect('/');
        return view('create');
    }

    public function store(Request $request)
    {
        if (!session('login')) return redirect('/');

        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }

        $ingredients = array_filter(array_map('trim', explode("\n", $request->ingredients)));
        $tools = array_filter(array_map('trim', explode("\n", $request->tools)));
        $steps = array_filter(array_map('trim', explode("\n", $request->steps)));

        Recipe::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imagePath,
            'time' => $request->time,
            'difficulty' => $request->difficulty,
            'description' => $request->description,
            'ingredients' => $ingredients,
            'tools' => $tools,
            'steps' => $steps,
        ]);

        return redirect('/home');
    }

    public function edit($id)
    {
        if (!session('login')) return redirect('/');
        
        $recipe = Recipe::findOrFail($id);
        $recipe->ingredients = implode("\n", $recipe->ingredients);
        $recipe->tools = implode("\n", $recipe->tools);
        $recipe->steps = implode("\n", $recipe->steps);
        
        return view('edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        if (!session('login')) return redirect('/');

        $recipe = Recipe::findOrFail($id);

        $imagePath = $recipe->image; 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }

        $ingredients = array_filter(array_map('trim', explode("\n", $request->ingredients)));
        $tools = array_filter(array_map('trim', explode("\n", $request->tools)));
        $steps = array_filter(array_map('trim', explode("\n", $request->steps)));

        $recipe->update([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imagePath, 
            'time' => $request->time,
            'difficulty' => $request->difficulty,
            'description' => $request->description,
            'ingredients' => $ingredients,
            'tools' => $tools,
            'steps' => $steps,
        ]);

        return redirect('/home');
    }

    public function destroy($id)
    {
        if (!session('login')) return redirect('/');
        
        Recipe::destroy($id);
        return redirect('/home');
    }
}