<?php

namespace App\Http\Livewire;

use App\Models\ServiceOrder;
use Livewire\Component;

class ShowServiceOrders extends Component
{

    public $search = "";

    public function render()
    {

        $orders = ServiceOrder::where('id', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.show-service-orders', compact('orders'));
    }
}
