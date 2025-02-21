<?php

// app/Http/Controllers/ParteEnvolvidaController.php
namespace App\Http\Controllers;

use App\Models\ParteEnvolvida;
use Illuminate\Http\Request;

class ParteEnvolvidaController extends Controller
{
    public function index()
    {
        return ParteEnvolvida::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'nullable|string|max:255',
        ]);

        return ParteEnvolvida::create($request->all());
    }

    public function show($id)
    {
        return ParteEnvolvida::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $parteEnvolvida = ParteEnvolvida::findOrFail($id);
        $parteEnvolvida->update($request->all());
        return $parteEnvolvida;
    }

    public function destroy($id)
    {
        ParteEnvolvida::destroy($id);
        return response()->json(['message' => 'Parte envolvida removida com sucesso!']);
    }
}
