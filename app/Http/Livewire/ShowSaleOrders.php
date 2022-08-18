<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\SaleOrder;
use Livewire\Component;
use Livewire\WithPagination;
use DB;
use Illuminate\Database\Eloquent\Builder;

class ShowSaleOrders extends Component
{
    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $orders = SaleOrder::where('id', 'like', '%' . $this->search . '%')
        ->orWhereHas('client', function(Builder $query){
            $query->where('name', 'LIKE', '%'.$this->search.'%');
        })
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.show-sale-orders', compact('orders'));
    }
}
