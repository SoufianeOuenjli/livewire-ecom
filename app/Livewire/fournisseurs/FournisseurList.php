<?php

namespace App\Livewire\Fournisseurs;

use App\Models\Fournisseur;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class FournisseurList extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'tailwind'; // use bootstrap if your project uses that

    protected $listeners = ['fournisseurDeleted' => '$refresh'];

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function deleteFournisseur($id)
    {
        $this->dispatch('swal:confirm', [
            'id' => $id,
        ]);

    }

    #[On('fournisseurDeleted')]
    public function deleteFournisseurConfirmed($id)
    {
        // dd('hahaha');
        // dd($id);
       Fournisseur::find($id)[0]->delete();
       // Provide feedback to the user (optional)
       $this->dispatch('swal:success', [
            'type' => 'success',
            'message' => 'Fournisseur supprimé avec succès !',
        ]);

    }

    public function render()
    {
        $fournisseurs = Fournisseur::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('telephone', 'like', '%' . $this->search . '%')
            ->orWhere('adresse', 'like', '%' . $this->search . '%')
            ->paginate(6);

        return view('livewire.fournisseurs.fournisseur-list', compact('fournisseurs'));
    }
}
