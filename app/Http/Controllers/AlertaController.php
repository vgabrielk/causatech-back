<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    public function index()
    {
        return Alerta::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'data' => 'required|date',
        ]);

        return Alerta::create($request->all());
    }

    public function show($id)
    {
        return Alerta::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $alerta = Alerta::findOrFail($id);
        $alerta->update($request->all());
        return $alerta;
    }

    public function destroy($id)
    {
        Alerta::destroy($id);
        return response()->json(['message' => 'Alerta removido com sucesso!']);
    }
}
