<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientEdit extends Component
{
    public $clientId;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $ville;
    public $adresse;

    public function mount(Client $client)
    {
        $this->clientId = $client->id;
        $this->nom = $client->nom;
        $this->prenom = $client->prenom;
        $this->email = $client->email;
        $this->telephone = $client->telephone;
        $this->ville = $client->ville;
        $this->adresse = $client->adresse;
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

        $client = Client::find($this->clientId);
        $client->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'ville' => $this->ville,
            'adresse' => $this->adresse,
        ]);

        $this->dispatch('swal:success', [
            'type' => 'success',
            'message' => 'Client mis à jour avec succès!'
        ]);

        return $this->redirectRoute('clients.index', navigate: true);
    }


    public function render()
    {
        return view('livewire.client-edit');
    }
}
