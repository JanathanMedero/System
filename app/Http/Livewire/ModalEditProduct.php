<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Livewire\Component;

class ModalEditProduct extends Component
{
    public $product;

    public $category_id, $brand, $description, $public_price, $dealer_price, $stock_matriz, $stock_virrey, $stock_total, $investment, $gain_public, $dealer_profit, $key_sat, $description_sat;

    public function mount($product_id)
    {
        $this->product = Inventory::where('id', $product_id)->first();

        $this->product->brand = $this->brand;
    }

    public function edit($product_id)
    {
        $product = Inventory::where('id', $product_id)->first();

        $categories = Category::all();

        $this->brand = $product->brand;
    }

    public function render()
    {
        return view('livewire.modal-edit-product');
    }
}
