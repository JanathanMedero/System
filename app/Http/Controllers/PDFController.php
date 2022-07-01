<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
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
}
