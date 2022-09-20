<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderSite;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all_services($slug)
    {
        $client = Client::where('slug', $slug)->first();

        return view('auth.services', compact('client'));
    }

    public function services($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $saleServices = SaleOrder::where('client_id', $client->id)->get();

        $serviceOrder = ServiceOrder::where('client_id', $client->id)->get();

        $serviceOrderSite = ServiceOrderSite::where('client_id', $client->id)->get();

        return view('auth.showAllServices', compact('client'));
    }
}
