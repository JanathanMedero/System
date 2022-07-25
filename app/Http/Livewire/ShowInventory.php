<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Livewire\Component;

class ShowInventory extends Component
{

    public $search = "";

    public function render()
    {
         $products = Inventory::where('id', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.show-inventory', compact('products'));
    }
}
