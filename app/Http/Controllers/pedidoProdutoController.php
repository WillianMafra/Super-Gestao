<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;
use Illuminate\Http\Request;

class pedidoProdutoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($pedidoId)
    {
        $dados['pedido'] = Pedido::find($pedidoId);
        $dados['produtos'] = Produto::orderBy('nome')->pluck('nome', 'id');
        return view('app.pedido_produto.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $pedidoId)
    {
        if($request->get('_token') != ''){
            $dados = [
                'produto_id' => $request->get('produto_id'),
                'pedido_id' => $pedidoId
            ];
            
            $pedidoProduto = new PedidoProduto();
            $pedidoProduto->fill($dados);
            $pedidoProduto->save();
        }
        return redirect()->route('pedidos.show', $pedidoId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedidoProduto = PedidoProduto::find($id);
        $pedidoProduto->delete();
        $pedidoId = $pedidoProduto->pedido_id;
        return redirect()->route('pedidos.show', $pedidoId);
    }
}
