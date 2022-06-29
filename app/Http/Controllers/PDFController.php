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

        $pdf = PDF::loadView('pdfSaleOrder', compact('order'));
        return $pdf->stream();
    }
}
