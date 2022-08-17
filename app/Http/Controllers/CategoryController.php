<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

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
        if (Auth::user()->id != 1) {
            abort(403, 'No tienes permisos');
        }

        $categories = Category::orderBy('name', 'ASC')->get();

        return view('auth.categories.index', compact('categories'));
    }
}
