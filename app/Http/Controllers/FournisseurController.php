<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = \App\Models\Fournisseur::paginate(6);
        return view('fournisseurs.index', compact('fournisseurs'));
    }
    public function create()
    {
        return view('fournisseurs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:fournisseurs',
        ]);

        \App\Models\Fournisseur::create($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur created successfully.');
    }
    public function edit($id)
    {
        $fournisseur = \App\Models\Fournisseur::findOrFail($id);
        return view('fournisseurs.edit', compact('fournisseur'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:fournisseurs,email,' . $id,
        ]);

        $fournisseur = \App\Models\Fournisseur::findOrFail($id);
        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur updated successfully.');
    }
    public function destroy($id)
    {
        $fournisseur = \App\Models\Fournisseur::findOrFail($id);
        $fournisseur->delete();

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur deleted successfully.');
    }
    public function show($id)
    {
        $fournisseur = \App\Models\Fournisseur::findOrFail($id);
        return view('fournisseurs.show', compact('fournisseur'));
    }
}
