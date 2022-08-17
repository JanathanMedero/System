<?php

namespace App\Http\Livewire;

use App\Models\ServiceOrder;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class ShowServiceOrders extends Component
{

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $orders = ServiceOrder::where('id', 'like', '%' . $this->search . '%')
        ->orWhereHas('client', function (Builder $query){
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.show-service-orders', compact('orders'));
    }
}
