<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function index()
    {
        return view('auth.clients.index');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->name);

        $client = Client::where('slug', $slug)->first();

        if ($client) {
            $random = Str::random(15);
            $slug = $slug.'-'.$random;
        }

        Client::create([
            'name'      => $request->name,
            'slug'      => $slug,
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

    public function suspend_account($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $client->confirmed != $client->confirmed;

        if ($client->confirmed == 1) {
            return back()->with('success', 'Cuenta activada correctamente');
         }else{
            return back()->with('danger', 'Cuenta suspendida correctamente');
         }
    }

    public function importClients(Request $request)
    {
        $file = $request->file('clients');
        Excel::import(new ClientsImport, $file);

        return back()->with('success', 'Clientes importados con exito');
    }

}
