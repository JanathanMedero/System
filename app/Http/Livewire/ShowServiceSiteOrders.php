<?php

namespace App\Http\Livewire;

use App\Models\ServiceOrderSite;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowServiceSiteOrders extends Component
{
    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $orders = ServiceOrderSite::where('id', 'like', '%' . $this->search . '%')
        ->orWhereHas('client', function (Builder $query){
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.show-service-site-orders', compact('orders'));
    }
}
