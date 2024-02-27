<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\PedidoProduto;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dados['pedidos'] = Pedido::paginate(5);
        $dados['request'] = $request->all();
        return view('app.pedidos.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dados['clientes'] = Cliente::orderBy('nome')->pluck('nome', 'id');
        return view('app.pedidos.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->get('_token') != ''){
            $pedido = new Pedido();
            $pedido->fill($request->all());
            $pedido->save();    
        }
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pedido $pedido)
    {
        $dados['request'] = $request->all();
        $dados['itensPedido'] = PedidoProduto::paginate(10);
        $dados['pedido'] = $pedido;
        return view('app.pedidos.show', $dados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $dados['clientes'] = Cliente::orderBy('nome')->pluck('nome', 'id');
        $dados['pedido'] = $pedido;
        return view('app.pedidos.edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        if($request->get('_token') != ''){
            $pedido->update($request->all());
        }
        return redirect()->route('pedidos.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
