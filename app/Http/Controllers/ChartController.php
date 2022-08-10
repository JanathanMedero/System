<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{


    public function chart(Request $request)
    {
        $sales = Sale::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();

        $categories = $sales->pluck('category')->unique()->values();

        // $cat = $sales->pluck('category')->countBy()->values();

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

        $total = $sales->sum('public_price');

        return view('chart', compact('data', 'sales', 'start', 'end', 'total'));
    }
}
