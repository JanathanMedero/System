<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    public function index()
    {
        return view('auth.inventory.index');
    }

    public function importProducts(Request $request)
    {
        $file = $request->file('Importproducts');
        Excel::import(new ProductsImport, $file);

        return back()->with('success', 'Productos importados con exito');
    }
}
