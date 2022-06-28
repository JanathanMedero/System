<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SaleOrderController extends Controller
{

    public function index()
    {
        return view('auth.saleOrder.index');
    }

    public function create($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $employees = User::get();

        return view('auth.saleOrder.create', compact('client', 'employees'));
    }

    public function show($id)
    {
        $order = SaleOrder::where('id', $id)->first();

        $employees = User::get();

        return view('auth.saleOrder.show', compact('order', 'employees'));
    }

    public function show_product($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $employees = User::get();

        return view('auth.saleOrder.show_product', compact('product', 'employees'));
    }

    public function store(Request $request, $slug)
    {
        $client = Client::where('slug', $slug)->first();

        DB::beginTransaction();

        try {
            $sale = SaleOrder::create([
                'employe_id'    => $request->employe_id,
                'client_id'     => $client->id,
                'office_id'     => $request->office_id,
            ]);

            Product::create([
                'sale_id'       => $sale->id,
                'name'          => $request->name,
                'slug'          => Str::slug($request->name),
                'quantity'      => $request->quantity,
                'unit_price'    => $request->unit_price,
                'net_price'     => $request->net_price,
                'description'   => $request->description,
                'warranty'      => $request->warranty,
                'observations'  => $request->observations,

            ]);

            DB::commit();

            return redirect()->route('saleOrder.show', $sale->id)->with('success', 'Orden de venta creada correctamente');

        } catch (\Exception $e) {
          DB::rollback();
          return $e->getMessage();
      }
  }

  public function add_product(Request $request, $id)
  {
    $order = SaleOrder::where('id', $id)->first();

    Product::create([
        'sale_id'       => $order->id,
        'name'          => $request->name,
        'slug'          => Str::slug($request->name),
        'quantity'      => $request->quantity,
        'unit_price'    => $request->unit_price,
        'net_price'     => $request->net_price,
        'description'   => $request->description,
        'warranty'      => $request->warranty,
        'observations'  => $request->observations,
    ]);

    return back()->with('success', 'Producto agregado correctamente');

}

}
