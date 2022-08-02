<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSales extends Component
{
    use WithPagination;

    public $search = "";

    public function render()
    {
        $sales = Sale::where('brand', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->orWhere('id', 'like', '%' . $this->search . '%')
        ->paginate(10);

        return view('livewire.show-sales', compact('sales'));
    }
}
