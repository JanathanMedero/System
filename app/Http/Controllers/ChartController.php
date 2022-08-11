<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{


    public function chart(Request $request)
    {
        // $sales = Sale::orderBy('id', 'DESC')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();

        $sales = Sale::orderBy('id', 'DESC')->whereBetween('created_at', [$request->start, $request->end])->get();

        if ($sales->isEmpty()) {
            return back()->with('danger', 'No hay ventas en el rango de fechas seleccionadas');
        }

        $total = $sales->sum('total');

        $categories = $sales->pluck('category')->unique()->values();

        $products = $sales->countBy('category');

        $salesMatriz = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('office', 'Sucursal Matriz')->get();

        $salesMatriz = $salesMatriz->sum('total');

        $salesVirrey = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('office', 'Sucursal Virrey')->get();

        $salesVirrey = $salesVirrey->sum('total');

        $data = [];

        foreach($categories as $category)
        {
            $data['label'][] = $category;

            $quantity = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('category', $category)->count();

            $data['data'][] = $quantity;
        }


        $data = json_encode($data,JSON_UNESCAPED_UNICODE);

        $start  = $request->start;
        $end    = $request->end;

        return view('chart', compact('data', 'sales', 'start', 'end', 'total', 'products', 'salesMatriz', 'salesVirrey'));
    }
}
