<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\produtoDetalhe;
use App\Models\Produto;

class produtoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($produtoId)
    {
        $dados['produto'] = Produto::find($produtoId);
        $dados['unidades'] = Unidade::pluck('descricao', 'id');
        return view('app.produto_detalhe.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->get('_token') != ''){
            $dados = [
                'produto_id' => $request->get('produto_id'),
                'comprimento' => $request->get('comprimento'),
                'largura' => $request->get('largura'),
                'altura' => $request->get('altura'),
                'unidade_id' => $request->get('unidade_id')
            ];
            $regrasValidacao = [
                'produto_id' => 'required|gt:0',
                'comprimento' => 'required|gt:0',
                'altura' => 'required|gt:0',
                'largura' => 'required|gt:0',
            ];
            
            $request->validate($regrasValidacao);

            $detalheProduto = new produtoDetalhe;
            $detalheProduto->fill($dados);
            $detalheProduto->save();

            return redirect()->route('produto.index');
        }
        return redirect()->route('produto.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    *
    * @param int $produtoDetalheId
    * @return \Illuminate\Http\Response
    */
    public function edit($produtoDetalheId)
    {

        $dados['unidades'] = Unidade::pluck('descricao', 'id');
        $dados['produto_detalhe'] = ProdutoDetalhe::find($produtoDetalheId);
        return view('app.produto_detalhe.edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalheProduto = produtoDetalhe::find($id);
        $detalheProduto->update($request->all());
        
        return redirect()->route('produto.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
