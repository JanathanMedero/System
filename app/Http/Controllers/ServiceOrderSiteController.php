<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ServiceOrderSite;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceOrderSiteController extends Controller
{
    public function index()
    {
        return view('auth.siteOrder.index');
    }

    public function create($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $employees = User::all();

        return view('auth.siteOrder.create', compact('client', 'employees'));
    }

    public function store($slug)
    {
        $client = Client::where('slug', $slug)->first();


    }
}
