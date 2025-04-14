<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Http\Requests\AdvogadoRequest;
use Illuminate\Http\Request;

class AdvogadoController extends Controller
{
    public function index()
    {
        return Advogado::orderBy('id', 'desc')->paginate();
    }

    public function store(AdvogadoRequest $request)
    {
        return Advogado::create($request->validated());
    }

    public function show(Advogado $advogado)
    {
        return $advogado;
    }

    public function update(AdvogadoRequest $request, Advogado $advogado)
    {
        $advogado->update($request->validated());
        return $advogado;
    }

    public function destroy(Advogado $advogado)
    {
        $advogado->delete();
        return response()->noContent();
    }
}
