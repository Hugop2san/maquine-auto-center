<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Listar todos os clientes
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    // Salvar novo cliente no banco
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'required|string|max:14|unique:clients',
            'documento_tipo' => 'required|in:CPF,CNPJ', // Validação baseada no seu CHECK[cite: 1]
            'email' => 'nullable|email',
            'data_nascimento' => 'nullable|date',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado!');
    }

    // Mostrar um cliente específico
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    // Atualizar dados
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients.index');
    }

    // Excluir cliente
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
