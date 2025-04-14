<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clienteId = $this->route('cliente')?->id;

        return [
            'nome' => 'required',
            'cpf' => [
                'required',
                Rule::unique('clientes', 'cpf')->ignore($clienteId),
            ],
            'rg' => [
                'required',
                Rule::unique('clientes', 'rg')->ignore($clienteId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('clientes', 'email')->ignore($clienteId),
            ],
            'telefone' => [
                'nullable',
                Rule::unique('clientes', 'telefone')->ignore($clienteId),
            ],
            'endereco' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O cpf é obrigatório!',
            'email.required' => 'O email é obrigatório!',
            'telefone.required' => 'O telefone é obrigatório!',
            'rg.required' => 'O rg é obrigatório!',
            'nome.required' => 'O nome é obrigatório!',
            'cpf.unique' => 'Um cliente com esse cpf já existe!',
            'rg.unique' => 'Um cliente com esse rg já existe!',
            'email.unique' => 'Um cliente com esse email já existe!',
            'telefone.unique' => 'Um cliente com esse telefone já existe!',
        ];
    }

}
