<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ServiceOrderSite;
use App\Models\ServicesOnSites;
use App\Models\User;
use DB;
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

	public function store(Request $request, $slug)
	{
		$client = Client::where('slug', $slug)->first();

		DB::beginTransaction();

		try{

			$Siteorder = ServiceOrderSite::create([
				'employe_id'            => $request->employe_id,
				'client_id'             => $client->id,
				'office_id'             => $request->office_id,
				'date_of_service'       => $request->date_of_service,
			]);

			ServicesOnSites::create([
				'order_service_id'  => $Siteorder->id,
				'name'              => $request->name,
				'slug'              => $request->slug,
				'quantity'          => $request->quantity,
				'net_price'         => $request->net_price,
				'description'       => $request->description,
			]);

			DB::commit();

			return redirect()->route('serviceSite.index')->with('success', 'Orden de servicio en sitio creada correctamente');

		} catch (\Exception $e) {
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function show($id)
	{
		$order = ServiceOrderSite::where('id', $id)->first();

		return view('auth.siteOrder.show', compact('order'));
	}
}
