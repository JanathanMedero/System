<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ShowClients extends Component
{

    public $search = "";

    public function render()
    {
        $clients = Client::where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')
                            // orWhere('folio', 'like', '%' . $this->search . '%')
        ->paginate(15);

        return view('livewire.show-clients', compact('clients'));
    }
}
