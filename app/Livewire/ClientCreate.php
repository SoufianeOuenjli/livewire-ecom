<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientCreate extends Component
{
    use WithFileUploads;

    // Form fields
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $ville;
    public $adresse;

    // Validation rules
    protected $rules = [
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clients,email',
        'telephone' => 'required|string|max:15',
        'adresse' => 'required|string|max:255',
    ];
    public function submit()
    {
        // dd('fff');
        // Validate the form data
        $this->validate();

        // Create a new client record in the database
        Client::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'ville' => $this->ville,
            'adresse' => $this->adresse,
        ]);

        // Optionally reset the form
        $this->reset();


        // Redirect to the index
        // Provide feedback to the user (optional)
        $this->dispatch('swal:success', [
            'message' => 'Client créé avec succès!'
        ]);
        return $this->redirectRoute('clients.index', navigate: true);


    }

    public function render()
    {
        return view('livewire.client-create');
    }
}
