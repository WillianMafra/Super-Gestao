<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dados['request'] = $request->all();
        $dados['clientes'] = Cliente::orderBy('nome')->paginate(5);
        return view('app.cliente.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->get('_token') != ''){
            $regrasValidacao = [
                'nome' => 'required|min:3'
            ];

            $request->validate($regrasValidacao);

            $cliente = new Cliente();
            $cliente->fill($request->all());
            $cliente->save();
        }
        return redirect()->route('cliente.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {   
        $dados['cliente'] = $cliente;
        return view('app.cliente.edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        if($request->get('_token') != ''){
            $regrasValidacao = [
                'nome' => 'required|min:3'
            ];

            $request->validate($regrasValidacao);

            $cliente->update($request->all());
            $cliente->save();
        }
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
