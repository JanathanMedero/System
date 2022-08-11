<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{


    public function chart(Request $request)
    {
        $data = [];

        if ($request->option == 'today') {
            $sales = Sale::orderBy('id', 'DESC')->whereDay('created_at', now()->day)->get();

            $salesMatriz = Sale::orderBy('id', 'DESC')->whereDay('created_at', now()->day)->where('office', 'Sucursal Matriz')->get();

            $salesMatriz = $salesMatriz->sum('total');

            $salesVirrey = Sale::orderBy('id', 'DESC')->whereDay('created_at', now()->day)->where('office', 'Sucursal Virrey')->get();

            $salesVirrey = $salesVirrey->sum('total');

            $categories = $sales->pluck('category')->unique()->values();

            foreach($categories as $category)
            {
                $data['label'][] = $category;

                $quantity = Sale::where('category', $category)->whereDay('created_at', now()->day)->count();

                $data['data'][] = $quantity;
            }

            $total = $sales->sum('total');

            $products = $sales->countBy('category');

            $status = 'today';

        }
        if($request->option == 'month') {
            $sales = Sale::orderBy('id', 'DESC')->whereMonth('created_at', now()->month)->get();

            $salesMatriz = Sale::orderBy('id', 'DESC')->whereMonth('created_at', now()->month)->where('office', 'Sucursal Matriz')->get();

            $salesMatriz = $salesMatriz->sum('total');

            $salesVirrey = Sale::orderBy('id', 'DESC')->whereMonth('created_at', now()->month)->where('office', 'Sucursal Virrey')->get();

            $salesVirrey = $salesVirrey->sum('total');

            $categories = $sales->pluck('category')->unique()->values();

            foreach($categories as $category)
            {
                $data['label'][] = $category;

                $quantity = Sale::where('category', $category)->whereMonth('created_at', now()->month)->count();

                $data['data'][] = $quantity;
            }

            $total = $sales->sum('total');

            $products = $sales->countBy('category');

            $status = 'month';
        }
        if($request->option == 'dates')
        {

            $sales = Sale::orderBy('id', 'DESC')->whereBetween('created_at', [$request->start, $request->end])->get();

            $salesMatriz = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('office', 'Sucursal Matriz')->get();

            $salesMatriz = $salesMatriz->sum('total');

            $salesVirrey = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('office', 'Sucursal Virrey')->get();

            $salesVirrey = $salesVirrey->sum('total');

            $categories = $sales->pluck('category')->unique()->values();

            foreach($categories as $category)
            {
                $data['label'][] = $category;

                $quantity = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('category', $category)->count();

                $data['data'][] = $quantity;
            }

            $total = $sales->sum('total');

            $products = $sales->countBy('category');

            $status = 'dates';
        }

        if ($sales->isEmpty()) {
            return back()->with('danger', 'No hay ventas en el rango de fechas seleccionadas');
        }


        $start  = $request->start;
        $end    = $request->end;

        $data = json_encode($data,JSON_UNESCAPED_UNICODE);

        return view('chart', compact('data', 'sales', 'start', 'end', 'total', 'products', 'salesMatriz', 'salesVirrey', 'status'));
    }
}
