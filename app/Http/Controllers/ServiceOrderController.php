<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    public function create($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $employees = User::all();

        return view('auth.serviceOrder.create', compact('client', 'employees'));
    }
}
