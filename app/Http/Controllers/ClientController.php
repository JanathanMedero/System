<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        return view('auth.clients.index');
    }

    public function store(Request $request)
    {
        Client::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'rfc'       => $request->rfc,
            'phone'     => $request->phone,
            'street'    => $request->street,
            'number'    => $request->number,
            'suburb'    => $request->suburb,
            'cp'        => $request->cp,
        ]);

        return back()->with('success', 'Cliente creado correctamente');
    }
}
