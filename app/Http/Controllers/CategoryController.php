<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Categoría agregada correctamente');
    }

    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('auth.categories.index', compact('categories'));
    }
}
