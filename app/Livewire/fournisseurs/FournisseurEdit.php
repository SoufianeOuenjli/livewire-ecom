<?php

namespace App\Livewire\Fournisseurs;

use Livewire\Component;
use App\Models\Fournisseur;

class FournisseurEdit extends Component
{
    public $fournisseurId;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $ville;
    public $adresse;

    public function mount(Fournisseur $fournisseur)
    {
        $this->fournisseurId = $fournisseur->id;
        $this->nom = $fournisseur->nom;
        $this->prenom = $fournisseur->prenom;
        $this->email = $fournisseur->email;
        $this->telephone = $fournisseur->telephone;
        $this->ville = $fournisseur->ville;
        $this->adresse = $fournisseur->adresse;
    }

    public function save()
    {
        // dd('eeee');
        $this->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'ville' => 'required|string',
            'adresse' => 'required|string',
        ]);

        $fournisseur = Fournisseur::find($this->fournisseurId);
        $fournisseur->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'ville' => $this->ville,
            'adresse' => $this->adresse,
        ]);

        $this->dispatch('swal:success', [
            'type' => 'success',
            'message' => 'Fournisseur mis à jour avec succès!'
        ]);

        return $this->redirectRoute('fournisseurs.index', navigate: true);
    }


    public function render()
    {
        return view('livewire.fournisseurs.fournisseur-edit');
    }
}
