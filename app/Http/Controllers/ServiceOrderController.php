<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceOrderRequest;
use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    public function create($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $employees = User::all();

        return view('auth.serviceOrder.create', compact('client', 'employees'));
    }

    public function store(StoreServiceOrderRequest $request, $slug)
    {
        $client = Client::where('slug', $slug)->first();

        DB::beginTransaction();

        try{

            $serviceOrder = ServiceOrder::create([
                'employe_id'    => $request->employe_id,
                'client_id'     => $client->id,
                'office_id'     => $request->office_id,
            ]);

            Service::create([
                'service_id'        => $serviceOrder->id,
                'equip'             => $request->equip,
                'brand'             => $request->brand,
                'serie'             => $request->serie,
                'accesories'        => $request->accesories,
                'features'          => $request->features,
                'failure'           => $request->failure,
                'observations'      => $request->observations,
                'solicited_service' => $request->solicited_service,
            ]);

            DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return $e->getMessage();
      }

  }
}
