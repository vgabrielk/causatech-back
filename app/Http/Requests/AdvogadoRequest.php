<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvogadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $advogadoId = $this->route('advogado')?->id;

        return [
            'nome' => 'required|string|max:255',
            'oab' => [
                'required',
                'digits_between:4,10',
                Rule::unique('advogados', 'oab')->ignore($advogadoId),
            ],
            'estado_oab' => [
                'required',
                'size:2',
                'alpha',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.',
            'oab.required' => 'O número da OAB é obrigatório.',
            'oab.digits' => 'O número da OAB deve conter apenas dígitos numéricos.',
            'oab.digits_between' => 'A OAB deve conter entre 4 e 10 dígitos numéricos.',
            'oab.unique' => 'Já existe um advogado com esse número de OAB.',
            'estado_oab.size' => 'O estado da OAB deve conter exatamente 2 letras.',
            'estado_oab.alpha' => 'O estado da OAB deve conter apenas letras.',
            'estado_oab.required' => 'O estado da OAB é obrigatório.',
        ];
    }
}
