<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::orderBy('id', 'desc')->paginate();
    }

    public function store(ClienteRequest $request)
    {

        return Cliente::create($request->validated());
    }

    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        return $cliente;
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->noContent();
    }
}
