<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class ShowInventory extends Component
{
    use WithFileUploads;

    public $search = "";

    public $category_id, $brand, $description, $public_price, $dealer_price, $stock_matriz, $stock_virrey, $stock_total, $investment, $gain_public, $dealer_profit, $key_sat, $description_sat;

    public $modal = false;

    public $file;

    public $disabled = 'disabled';

    public function updated()
    {

        if ($this->dealer_price == null) {
            $this->dealer_price = 0;
        }

        //Existencias totales
        if ($this->stock_matriz == null) {
            $this->stock_matriz = 0;
        }

        if ($this->stock_virrey == null) {
            $this->stock_virrey = 0;
        }

        $this->stock_total = ($this->stock_matriz) + ($this->stock_virrey);

        //Ganancia a distribuidor
        if ($this->public_price == null) {
            $this->public_price = 0;
        }

        if ($this->investment == null) {
            $this->investment = 0;
        }

        $this->dealer_profit = ($this->dealer_price) - ($this->investment);

        //Ganancia apúblico

        $this->gain_public = ($this->public_price) - ($this->investment);

        if ($this->file != null) {
            $this->disabled = '';
        }

    }

    public function render()
    {
     $products = Inventory::where('description', 'like', '%' . $this->search . '%')
     ->orderBy('created_at', 'DESC')->paginate(10);

     $categories = Category::all();

     return view('livewire.show-inventory', compact('products', 'categories'));
 }

     public function storeProduct(Request $request)
     {

        if ($this->file != null)
        {
            $this->file = 'public/'.$this->file->store('imagenes');
        }else
        {
            $this->file = 'no-image.png';
        }

        Inventory::create([
            'category_id'       => $this->category_id,
            'brand'             => $this->brand,
            'description'       => $this->description,
            'image'             => $this->file,
            'public_price'      => $this->public_price,
            'dealer_price'      => $this->dealer_price,
            'stock_matriz'      => $this->stock_matriz,
            'stock_virrey'      => $this->stock_virrey,
            'stock_total'       => $this->stock_total,
            'investment'        => $this->investment,
            'gain_public'       => $this->gain_public,
            'dealer_profit'     => $this->dealer_profit,
            'key_sat'           => $this->key_sat,
            'description_sat'   => $this->description_sat,
        ]);

        return redirect()->route('inventory')->with('success', 'Producto creado correctamente');
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function clearData()
    {
        $this->category_id      = null;
        $this->brand            = null;
        $this->description      = null;
        $this->public_price     = null;
        $this->dealer_price     = null;
        $this->stock_matriz     = null;
        $this->stock_virrey     = null;
        $this->stock_total      = null;
        $this->investment       = null;
        $this->gain_public      = null;
        $this->dealer_profit    = null;
        $this->key_sat          = null;
        $this->description_sat  = null;
    }

    public function edit($product_id)
    {

            // $this->loading();

        $product = Inventory::where('id', $product_id)->first();

        $this->category_id      = $product->category_id;
        $this->brand            = $product->brand;
        $this->description      = $product->description;
        $this->public_price     = $product->public_price;
        $this->dealer_price     = $product->dealer_price;
        $this->stock_matriz     = $product->stock_matriz;
        $this->stock_virrey     = $product->stock_virrey;
        $this->stock_total      = $product->stock_total;
        $this->investment       = $product->investment;
        $this->gain_public      = $product->gain_public;
        $this->dealer_profit    = $product->dealer_profit;
        $this->key_sat          = $product->key_sat;
        $this->description_sat  = $product->description_sat;

        $this->openModal();
    }

    public function updateProduct($product_id)
    {
        $product = Inventory::where('id', $product_id)->first();

        $product->category_id           = $this->category_id;
        $product->brand                 = $this->brand;
        $product->description           = $this->description;
        $product->public_price          = $this->public_price;
        $product->dealer_price          = $this->dealer_price;
        $product->stock_matriz          = $this->stock_matriz;
        $product->stock_virrey          = $this->stock_virrey;
        $product->stock_total           = $this->stock_total;
        $product->investment            = $this->investment;
        $product->gain_public           = $this->gain_public;
        $product->dealer_profit         = $this->dealer_profit;
        $product->key_sat               = $this->key_sat;
        $product->description_sat       = $this->description_sat;

        $product->save();

        return redirect()->route('inventory')->with('info', 'Producto actualizado correctamente');
    }
}
