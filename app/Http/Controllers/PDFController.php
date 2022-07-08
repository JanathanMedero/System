<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use PDF;
use Carbon\carbon;

class PDFController extends Controller
{
    public function saleOrder($id)
    {
        $order = SaleOrder::where('id', $id)->first();

        $total = $order->products->pluck('net_price')->sum();

        $subtotal = ($total - $order->advance);

        $pdf = PDF::loadView('pdfSaleOrder', compact('order', 'total', 'subtotal'));
        return $pdf->stream();
    }

    public function serviceOrder($id)
    {
        $order = ServiceOrder::where('id', $id)->first();

        $date = Carbon::parse($order->created_at)->format('d-m-Y');

        $pdf = PDF::loadView('pdfServiceOrder', compact('order', 'date'));
        return $pdf->stream();
    }
}
