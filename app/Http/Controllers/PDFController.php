<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderSite;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

    public function serviceOrder($folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $date = Carbon::parse($order->created_at)->format('d-m-Y');

        $url = ('http://192.168.1.13:3000/show-order-service/client/'.$order->client->slug.'/order/'.$order->folio);

        $qr = QrCode::size(150)->generate($url, '../public/qrcodes/qrcode-'.$order->folio.'.svg');

        $pdf = PDF::loadView('pdfServiceOrder', compact('order', 'date'));
        return $pdf->stream();
    }

    public function showOrderService($slug, $folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        return view('qr.showOrderService', compact('order'));
    }

    public function serviceOnSite($folio)
    {
        $order = ServiceOrderSite::where('folio', $folio)->first();

        $date = Carbon::parse($order->created_at)->format('d-m-Y');

        $total = $order->services->pluck('net_price')->sum();

        $subtotal = ($total - $order->advance);

        $url = ('http://192.168.1.13:3000/show-order-service-site/client/'.$order->client->slug.'/order/'.$order->folio);

        $qr = QrCode::size(150)->generate($url, '../public/qrcodes/qrcode-'.$order->folio.'.svg');

        $pdf = PDF::loadView('pdfServiceOnSite', compact('order', 'date', 'total', 'subtotal'));
        return $pdf->stream();
    }

    public function showOrderServiceSite($slug, $folio)
    {
        $order = ServiceOrderSite::where('folio', $folio)->first();

        $total = $order->services->pluck('net_price')->sum();

        $subtotal = ($total - $order->advance);

        return view('qr.showOrderServiceSite', compact('order', 'total', 'subtotal'));
    }
}
