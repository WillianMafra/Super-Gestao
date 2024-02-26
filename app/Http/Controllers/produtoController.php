<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produto = Produto::join('unidades', 'unidades.id', '=', 'produtos.unidade_id')->select('produtos.*', 'unidades.unidade')->paginate(5);

        $dados['produtos'] = $produto;
        $dados['request'] = $request->all();
    
        return view('app.produto.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $unidades = Unidade::pluck('descricao', 'id');

        $dados['request'] = $request->all();
        $dados['unidades'] = $unidades;
        return view('app.produto.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->get('_token'))){
            $dados = $request->all();
            $regrasValidacao = [
                'nome' => 'required',
                'descricao' => 'required',
                'peso' => 'required'
            ];


            $request->validate($regrasValidacao);

            $produto = new Produto();
            $produto->fill($dados);
            $produto->save();

            return redirect()->route('produto.index');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::pluck('descricao', 'id');

        $dados['produto'] = $produto;
        $dados['unidades'] = $unidades;

        return view('app.produto.edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {

        $dados = $request->all();

        $produto->update($dados);

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');

    }
}
