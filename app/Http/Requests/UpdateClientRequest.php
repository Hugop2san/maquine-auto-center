<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // (Com banco de dados) Pegamos o ID do cliente da rota para ignorar na validação de 'unique'
        // $clientId = $this->route('clientes')->id;

        return [
            'nome' => ['sometimes', 'string', 'max:255'],
            'documento' => ['sometimes', 'string', 'max:14'], // Removida a regra 'unique'
            'documento_tipo' => ['sometimes', 'in:CPF,CNPJ'],
            'email' => ['nullable', 'email'],
            'data_nascimento' => ['nullable', 'date'],
        ];
    }

    // Verificação de campos não permitidos
    protected function prepareForValidation()
    {
        $enviados = array_keys($this->all());

        $permitidos = ['nome', 'documento', 'documento_tipo', 'email', 'data_nascimento'];

        $intrusos = array_diff($enviados, $permitidos);

        if (! empty($intrusos)) {
            abort(response()->json([
                'message' => 'Erro de segurança: Campos não permitidos detectados.',
                'campos_invalidos' => array_values($intrusos),
                'status' => 'error',
            ], 422));
        }
    }
}
