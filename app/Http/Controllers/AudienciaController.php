<?php

// app/Http/Controllers/AudienciaController.php
namespace App\Http\Controllers;

use App\Models\Audiencia;
use Illuminate\Http\Request;

class AudienciaController extends Controller
{
    public function index()
    {
        return Audiencia::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'descricao' => 'nullable|string|max:255',
        ]);

        return Audiencia::create($request->all());
    }

    public function show($id)
    {
        return Audiencia::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $audiencia = Audiencia::findOrFail($id);
        $audiencia->update($request->all());
        return $audiencia;
    }

    public function destroy($id)
    {
        Audiencia::destroy($id);
        return response()->json(['message' => 'Audiência removida com sucesso!']);
    }
}
