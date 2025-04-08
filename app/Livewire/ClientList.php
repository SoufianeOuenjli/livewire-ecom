<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;

class ClientList extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'tailwind'; // use bootstrap if your project uses that

    protected $listeners = ['clientDeleted' => '$refresh'];

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function deleteClient($id)
    {
        Client::findOrFail($id)->delete();
    }

    public function render()
    {
        $clients = Client::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('telephone', 'like', '%' . $this->search . '%')
            ->orWhere('adresse', 'like', '%' . $this->search . '%')
            ->paginate(6);

        return view('livewire.client-list', compact('clients'));
    }
}
