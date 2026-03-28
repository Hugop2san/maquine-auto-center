<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // Verificação de campos não permitidos
    protected function prepareForValidation()
    {
        $enviados = array_keys($this->all());
        $permitidos = ['nome', 'documento', 'documento_tipo'];
        $intrusos = array_diff($enviados, $permitidos);

        if (! empty($intrusos)) {
            abort(response()->json([
                'message' => 'Erro de validação: Campos não permitidos detectados.',
                'campos_invalidos' => array_values($intrusos),
            ], 422));
        }
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            // unique comentado para testar sem banco:
            'documento' => ['required', 'string', 'max:14' /* , 'unique:clients' */],
            'documento_tipo' => ['required', 'in:CPF,CNPJ'],
        ];
    }
}
