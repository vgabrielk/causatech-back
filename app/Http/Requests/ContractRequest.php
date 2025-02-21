<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
    /**
     * Determinar se o usuário está autorizado a fazer a requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação.
     */
    public function rules(): array
    {
        $contractId = $this->route('contract') ? $this->route('contract')->id : null;
        return [
            'user_id' => 'nullable|exists:users,id',
            'contract_number' => 'nullable|string|unique:contracts,contract_number,' . ($contractId ?? 'NULL'),
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'value' => 'nullable|numeric|min:0',
            'details' => 'nullable|array',
        ];
    }

    /**
     * Mensagens de erro personalizadas.
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'O usuário é obrigatório.',
            'user_id.exists' => 'O usuário não existe.',

            'contract_number.required' => 'O número do contrato é obrigatório.',
            'contract_number.unique' => 'Este número de contrato já está em uso.',

            'start_date.required' => 'A data de início é obrigatória.',
            'start_date.date' => 'A data de início deve ser uma data válida.',

            'end_date.date' => 'A data de término deve ser uma data válida.',
            'end_date.after_or_equal' => 'A data de término deve ser igual ou posterior à data de início.',

            'value.required' => 'O valor do contrato é obrigatório.',
            'value.numeric' => 'O valor deve ser um número.',
            'value.min' => 'O valor não pode ser negativo.',


            'details.array' => 'As informações do contrato devem estar no formato JSON.',
        ];
    }
}
