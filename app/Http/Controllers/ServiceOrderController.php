<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceOrderRequest;
use App\Models\Client;
use App\Models\Report;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
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

		$random = Str::random(15);

		DB::beginTransaction();

		try{

			$serviceOrder = ServiceOrder::create([
				'folio'			=> $random,
				'employe_id'    => $request->employe_id,
				'client_id'     => $client->id,
				'office_id'     => $request->office_id,
				'invoice'       => $request->invoice,
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

			return redirect()->route('serviceOrder.show', $serviceOrder->id)->with('success', 'Orden de servicio creada correctamente');

		} catch (\Exception $e) {
			DB::rollback();
			return $e->getMessage();
		}

	}

	public function index()
	{
		return view('auth.serviceOrder.index');
	}

	public function show($id)
	{
		$order = ServiceOrder::where('id', $id)->first();

		$employees = User::all();

		return view('auth.serviceOrder.show', compact('order', 'employees'));
	}

	public function update(Request $request, $id)
	{

		$serviceOrder = ServiceOrder::where('id', $id)->first();

		DB::beginTransaction();

		try{

			$serviceOrder->employe_id   = $request->employe_id;
			$serviceOrder->office_id    = $request->office_id;

			$serviceOrder->service->equip               = $request->equip;
			$serviceOrder->service->brand               = $request->brand;
			$serviceOrder->service->serie               = $request->serie;
			$serviceOrder->service->accesories          = $request->accesories;
			$serviceOrder->service->features            = $request->features;
			$serviceOrder->service->failure             = $request->failure;
			$serviceOrder->service->observations        = $request->observations;
			$serviceOrder->service->solicited_service   = $request->solicited_service;

			$serviceOrder->save();
			$serviceOrder->service->save();

			DB::commit();

			return redirect()->route('serviceOrder.show', $serviceOrder->id)->with('success', 'Orden de servicio actualizada correctamente');

		} catch (\Exception $e) {
			DB::rollback();
			return $e->getMessage();
		}

	}

	public function update_status($id)
	{
		$order = ServiceOrder::where('id', $id)->first();

		if ($order->status == 'active') {
			$order->status = 'canceled';
			$order->save();
			return back()->with('danger', 'Orden de servicio cancelada correctamente');
		}else{
			$order->status = 'active';
			$order->save();
			return back()->with('success', 'Orden activada correctamente');
		}

	}

	public function report(Request $request, $id)
	{
		$order = ServiceOrder::where('id', $id)->first();

		DB::beginTransaction();

		try {

			$report = Report::create([
				'report' 		=> $request->report,
				'observations' 	=> $request->observations,
			]);

			$order->report_id = $report->id;
			$order->save();

			DB::commit();

			return back()->with('success', 'Reporte agregado correctamente');

		} catch (\Exception $e) {
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function report_update(Request $request, $id)
	{
		$order = ServiceOrder::where('id', $id)->first();

		$report = Report::where('id', $order->report_id)->first();

		$report->report = $request->report;
		$report->observations = $request->observations;

		$report->save();

		return back()->with('success', 'Reporte actualizado correctamente');
	}

}
