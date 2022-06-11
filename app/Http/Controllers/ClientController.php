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

    public function update(Request $request, $slug)
    {
        $client = Client::where('slug', $slug)->first();

        $client->name   = $request->name;
        $client->slug   = Str::slug($request->name);
        $client->rfc    = $request->rfc;
        $client->phone  = $request->phone;
        $client->street = $request->street;
        $client->number = $request->number;
        $client->suburb = $request->suburb;
        $client->cp     = $request->cp;

        $client->save();

        return back()->with('info', 'Cliente actualizado correctamente');

    }

}
