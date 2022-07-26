<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Support\Str;
use Livewire\Component;

class ShowInventory extends Component
{

    public $search = "";

    public $category_id, $brand, $description, $public_price, $dealer_price, $stock_matriz, $stock_virrey, $stock_total, $investment, $gain_public, $dealer_profit, $key_sat, $description_sat;

    public function updated()
    {

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


    }

    public function render()
    {
         $products = Inventory::where('description', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'DESC')->paginate(10);

        $categories = Category::all();

        return view('livewire.show-inventory', compact('products', 'categories'));
    }

    public function storeProduct()
    {
        Inventory::create([
            'category_id'       => $this->category_id,
            'brand'             => $this->brand,
            'description'       => $this->description,
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
}
