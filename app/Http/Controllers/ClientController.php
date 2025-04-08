<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = \App\Models\Client::paginate(6);
        return view('clients.index', compact('clients'));
    }
    public function create()
    {
        return view('clients.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
        ]);

        \App\Models\Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }
    public function edit($id)
    {
        $client = \App\Models\Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $id,
        ]);

        $client = \App\Models\Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }
    public function destroy($id)
    {
        $client = \App\Models\Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
    public function show($id)
    {
        $client = \App\Models\Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }
}
