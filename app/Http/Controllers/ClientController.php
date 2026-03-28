<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    // Simulando um banco de dados na memória
    private static $clientesFake = [
        ['id' => 1, 'nome' => 'Oficina do Prime', 'documento' => '12345678000199', 'documento_tipo' => 'CNPJ'],
        ['id' => 2, 'nome' => 'Carlos Mecânico', 'documento' => '11122233344', 'documento_tipo' => 'CPF'],
    ];

    // GET /clients - Listar
    public function index()
    {
        return response()->json([
            'message' => 'Lista de clientes (Modo Simulação)',
            'data' => self::$clientesFake,
        ], 200);
    }

    // POST /clients - Criar
    public function store(StoreClientRequest $request)
    {
        // Pega os dados que passaram na validação do StoreClientRequest
        $dados = $request->validated();

        // Simula a criação adicionando um ID aleatório
        $novoCliente = array_merge(['id' => rand(3, 999)], $dados);

        return response()->json([
            'message' => 'Cliente criado com sucesso (Simulado)!',
            'data' => $novoCliente,
        ], 201); // 201 é o status de "Created"
    }

    // GET /clients/{id} - Mostrar um
    public function show($id)
    {
        // Apenas para teste, retornamos sempre o primeiro do mock
        return response()->json([
            'data' => self::$clientesFake[0],
        ], 200);
    }

    // PUT /clients/{id} - Atualizar
    public function update(UpdateClientRequest $request, $id)
    {
        $dados = $request->validated();

        return response()->json([
            'message' => "Cliente {$id} atualizado (Simulado)!",
            'data' => $dados,
        ], 200);
    }

    // DELETE /clients/{id} - Deletar
    public function destroy($id)
    {
        return response()->json([
            'message' => "Cliente {$id} removido do sistema.",
        ], 200);
    }
}
