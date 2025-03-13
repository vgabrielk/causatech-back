<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use Illuminate\Http\Request;

class AdvogadoController extends Controller
{
    public function index()
    {
        return Advogado::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'oab' => 'required|unique:advogados',
            'estado_oab' => 'required',
        ]);

        return Advogado::create($request->all());
    }

    public function show(Advogado $advogado)
    {
        return $advogado;
    }

    public function update(Request $request, Advogado $advogado)
    {
        $advogado->update($request->all());
        return $advogado;
    }

    public function destroy(Advogado $advogado)
    {
        $advogado->delete();
        return response()->noContent();
    }
}
