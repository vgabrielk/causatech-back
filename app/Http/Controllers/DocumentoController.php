<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        return Documento::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'caminho' => 'required|string|max:255',
        ]);

        return Documento::create($request->all());
    }

    public function show($id)
    {
        return Documento::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        $documento->update($request->all());
        return $documento;
    }

    public function destroy($id)
    {
        Documento::destroy($id);
        return response()->json(['message' => 'Documento removido com sucesso!']);
    }
}
