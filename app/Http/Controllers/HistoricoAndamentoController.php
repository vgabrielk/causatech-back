<?php

// app/Http/Controllers/HistoricoAndamentoController.php
namespace App\Http\Controllers;

use App\Models\HistoricoAndamento;
use Illuminate\Http\Request;

class HistoricoAndamentoController extends Controller
{
    public function index()
    {
        return HistoricoAndamento::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'data' => 'required|date',
        ]);

        return HistoricoAndamento::create($request->all());
    }

    public function show($id)
    {
        return HistoricoAndamento::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $historico = HistoricoAndamento::findOrFail($id);
        $historico->update($request->all());
        return $historico;
    }

    public function destroy($id)
    {
        HistoricoAndamento::destroy($id);
        return response()->json(['message' => 'Histórico de andamento removido com sucesso!']);
    }
}
