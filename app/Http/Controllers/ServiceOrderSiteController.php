<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ServiceOrderSite;
use App\Models\ServicesOnSites;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

		$total = $order->services->pluck('net_price')->sum();

		$subtotal = ($total - $order->advance);

		$employees = User::all();

		return view('auth.siteOrder.show', compact('order', 'total', 'subtotal', 'employees'));
	}

	public function add_advance(Request $request, $id)
	{
		$order = ServiceOrderSite::where('id', $id)->first();

		$total = $order->services->pluck('net_price')->sum();

		if ($request->advance > $total) {
			return back()->with('danger', 'El anticipo no puede ser mayor a la deuda total');
		}

		$order->advance = $request->advance;
		$order->save();

		return back()->with('success', 'Anticipo agregado correctamente');
	}

	public function add_service(Request $request, $id)
	{
		$order = ServiceOrderSite::where('id', $id)->first();

		$random = Str::random(25);

		$service = ServicesOnSites::create([
			'order_service_id'  => $order->id,
			'name'              => $request->name,
			'slug'              => Str::slug($request->slug.'-'.$random),
			'quantity'          => $request->quantity,
			'net_price'         => $request->net_price,
			'description'       => $request->description,
		]);

		return back()->with('success', 'Servicio agregado correctamente');
	}

	public function update_status($id)
	{
		$order = ServiceOrderSite::where('id', $id)->first();

        if ($order->status == 'active') {
            $order->status = 'canceled';
            $order->save();
            return back()->with('danger', 'Orden de servicio en sitio cancelada correctamente');
        }else{
            $order->status = 'active';
            $order->save();
            return back()->with('success', 'Orden activada correctamente');
        }
	}

	public function update(Request $request, $id)
	{
		$order = ServiceOrderSite::where('id', $id)->first();

		$order->employe_id 		= $request->employe_id;
		$order->office_id 		= $request->office_id;
		$order->date_of_service = $request->date_of_service;
		$order->observations 	= $request->observations;
		$order->save();

		return back()->with('success', 'Orden actualizada correctamente');
	}

	public function update_service(Request $request, $id)
	{
		$service = ServicesOnSites::where('id', $id)->first();

		$random = Str::random(25);

		$service->name = $request->name;
		$service->slug = Str::slug($request->name.'-'.$random);
		$service->quantity = $request->quantity;
		$service->net_price = $request->net_price;
		$service->description = $request->description;

		$service->save();

		return back()->with('success', 'Servicio actualizado correctamente');
	}

	public function destroy_service($id)
	{
		$service = ServicesOnSites::where('id', $id)->first();

		$service->delete();

		return back()->with('success', 'Servicio eliminado correctamente');

	}
}
