<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderSite;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Http\Request;
use PDF;

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

    public function serviceOnSite($id)
    {
        $order = ServiceOrderSite::where('id', $id)->first();

        $date = Carbon::parse($order->created_at)->format('d-m-Y');

        $total = $order->services->pluck('net_price')->sum();

        $subtotal = ($total - $order->advance);

        $pdf = PDF::loadView('pdfServiceOnSite', compact('order', 'date', 'total', 'subtotal'));
        return $pdf->stream();
    }
}
