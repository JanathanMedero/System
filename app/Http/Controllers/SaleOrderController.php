<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleOrderRequest;
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

    public function edit($id)
    {
        $order = SaleOrder::where('id', $id)->first();

        $employees = User::get();

        $total = $order->products->pluck('net_price')->sum();

        $subtotal = ($total - $order->advance);

        return view('auth.saleOrder.edit', compact('order', 'employees', 'total', 'subtotal'));
    }

    public function show_product($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $employees = User::get();

        return view('auth.saleOrder.show_product', compact('product', 'employees'));
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();

        $slug = Str::slug($request->name);

        $search = Product::where('slug', $slug)->first();

        if ($search) {
            $slug = Str::slug($request->name . '-' . Str::random(15));
        }

        $product->name          = $request->name;
        $product->slug          = $slug;
        $product->quantity      = $request->quantity;
        $product->unit_price    = $request->unit_price;
        $product->net_price     = $request->net_price;
        $product->description   = $request->description;
        $product->warranty      = $request->warranty;
        $product->observations  = $request->observations;

        $product->save();

        return redirect()->route('saleOrder.edit', $product->sale_id)->with('success', 'Producto editado correctamente');

    }

    public function update_order(Request $request, $id)
    {
        $order = SaleOrder::where('id', $id)->first();

        $order->created_at  = $request->date_of_sale;
        $order->employe_id  = $request->employe_id;
        $order->office_id   = $request->office_id;

        $order->save();

        return back()->with('success', 'Orden actualizada correctamente');

    }

    public function store(StoreSaleOrderRequest $request, $slug)
    {
        $client = Client::where('slug', $slug)->first();

        DB::beginTransaction();

        try {

            $sale = SaleOrder::create([
                'employe_id'    => $request->employe_id,
                'client_id'     => $client->id,
                'office_id'     => $request->office_id,
                'advance'       => $request->advance,
                'pay'           => $request->pay,
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

            return redirect()->route('saleOrder.edit', $sale->id)->with('success', 'Orden de venta creada correctamente');

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

    public function destroy_product($slug)
    {
        $product = product::where('slug', $slug)->first();

        $product->delete();

        return back()->with('danger', 'producto eliminado correctamente');
    }

    public function add_advance(Request $request, $id)
    {
        $order = SaleOrder::where('id', $id)->first();

        $order->advance = $request->advance;

        $total = $order->products->pluck('net_price')->sum();

        if ($request->advance > $total) {
            return back()->with('danger', 'El anticipo no puede ser mayor a la venta total');
        }

        $order->save();

        return back()->with('success', 'Anticipo agregado correctamente');
    }

}
