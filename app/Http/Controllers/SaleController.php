<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return view('auth.sales.index');
    }

    public function destroy($id)
    {
        $sale = Sale::where('id', $id)->first();

        $sale->delete();

        return back()->with('success', 'Venta eliminada correctamente');
    }
}
