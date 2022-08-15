<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {

        $category = Category::where('name', $request->name)->first();

        if ($category) {
            return back()->with('danger', 'Esta categoría ya esta registrada');
        }

        Category::create([
            'name' => ucwords($request->name),
        ]);

        return back()->with('success', 'Categoría agregada correctamente');
    }

    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('auth.categories.index', compact('categories'));
    }
}
