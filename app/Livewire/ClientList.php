<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

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
        $this->dispatch('swal:confirm', [
            'id' => $id,
        ]);

    }

    #[On('clientDeleted')]
    public function deleteClientConfirmed($id)
    {
        // dd('hahaha');
        // dd($id);
       Client::find($id)[0]->delete();
        // dd($client);
        // if ($client) {
        //     $client->delete();
        //     $this->dispatch('swal:success', [
        //         'message' => 'Client deleted successfully!'
        //     ]);
        // } else {
        //     $this->dispatch('swal:error', [
        //         'message' => 'Client not found!'
        //     ]);
        // }
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
