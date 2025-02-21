<?php

// app/Http/Controllers/ProcessoController.php
namespace App\Http\Controllers;

use App\Models\Processo;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function index()
    {
        return Processo::with(['cliente', 'advogado', 'partesEnvolvidas', 'audiencias', 'documentos', 'historicoAndamento', 'alertas'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:processos',
            'assunto' => 'required',
            'data_inicio' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'advogado_id' => 'required|exists:advogados,id',
        ]);

        return Processo::create($request->all());
    }

    public function show(Processo $processo)
    {
        return $processo->load(['cliente', 'advogado', 'partesEnvolvidas', 'audiencias', 'documentos', 'historicoAndamento', 'alertas']);
    }

    public function update(Request $request, Processo $processo)
    {
        $processo->update($request->all());
        return $processo;
    }

    public function destroy(Processo $processo)
    {
        $processo->delete();
        return response()->noContent();
    }
}
