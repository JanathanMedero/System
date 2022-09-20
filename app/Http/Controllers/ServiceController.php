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

        return view('auth.showAllServices', compact('client'));
    }

    public function saleOrders($slug)
    {
        $client = Client::where('slug', $slug)->first();

        return view('auth.services.saleOrder', compact('client'));
    }

    public function serviceOrders($slug)
    {
        $client = Client::where('slug', $slug)->first();

        return view('auth.services.servicesOrder', compact('client'));
    }

    public function siteOrders($slug)
    {
        $client = Client::where('slug', $slug)->first();

        return view('auth.services.siteOrder', compact('client'));
    }
}
