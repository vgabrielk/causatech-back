<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Listar todos os contratos.
     */
    public function index()
    {
        $contracts = Contract::with('user')->paginate();
        return response()->json($contracts);
    }

    /**
     * Criar um novo contrato.
     */
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->validated());
        return response()->json($contract, 201);
    }

    /**
     * Exibir um contrato específico.
     */
    public function show(Contract $contract)
    {
        return response()->json($contract);
    }

    /**
     * Atualizar um contrato.
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());
        return response()->json($contract);
    }

    /**
     * Deletar um contrato.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return response()->json(['message' => 'Contrato excluído com sucesso.'], 200);
    }
}
