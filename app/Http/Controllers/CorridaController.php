<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corrida;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreCorridaRequest;
use App\Http\Requests\UpdateCorridaRequest;

class CorridaController extends Controller
{
    public readonly Corrida $corrida;

    public function __construct()
    {
    $this->corrida = new Corrida();
    }

    public function index()
    {
        $corridas = Corrida::all();

        return view('Corrida', ['corridas' => $corridas]);
    }
    public function create()
    {

    return view('corridas_past.Criar');

    }
    public function store(StoreCorridaRequest $request)
    {
        $created = $this->corrida->create([
            'preco' => $request->input('preco'),
            'data' => $request->input('data'),
            'nome_cliente' => $request->input('nome_cliente'),
        ]);

        return redirect()->route('corrida.index')->with('criado', 'im');
    }
    public function show($id)

    {

    }

    public function edit(Corrida $corrida)
{
    return view('corridas_past.Editar', ['corrida' => $corrida]);
}

public function update(Corrida $corrida, UpdateCorridaRequest $request)
{
    $corrida->update($request->except(['_token', '_method']));

    return redirect()->route('corrida.index')->with('editado', 'm');
}


    public function destroy(Corrida $corrida)
{
    $corrida->delete();
    return redirect()->route('corrida.index');
}
}
