<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\SaleOrder;
use Livewire\Component;

class ShowSaleOrders extends Component
{

    public $search = "";

    public function render()
    {
        $orders = SaleOrder::where('id', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'DESC')->paginate(10);
                            // orWhere('id', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.show-sale-orders', compact('orders'));
    }
}
