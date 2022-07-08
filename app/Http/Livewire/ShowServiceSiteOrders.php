<?php

namespace App\Http\Livewire;

use App\Models\ServiceOrderSite;
use Livewire\Component;

class ShowServiceSiteOrders extends Component
{

    public $search = "";

    public function render()
    {

        $orders = ServiceOrderSite::where('id', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.show-service-site-orders', compact('orders'));
    }
}
