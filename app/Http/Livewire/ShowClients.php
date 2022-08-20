<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\WithPagination;
use Livewire\Component;

class ShowClients extends Component
{

    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $clients = Client::where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')
        ->orWhere('id', 'like', '%' . $this->search . '%')->paginate(10);

        // $clients = Client::all();

        return view('livewire.show-clients', compact('clients'));
    }
}
