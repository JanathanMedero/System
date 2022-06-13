<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all_services($slug)
    {
        $client = Client::where('slug', $slug)->first();

        return view('auth.services', compact('client'));
    }
}
