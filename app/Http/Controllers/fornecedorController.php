<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model 
use App\Models\estados;
use App\Models\Fornecedor;


class fornecedorController extends Controller
{

    public function index(){
        $estados = estados::pluck('nome', 'id');
        return view('app.fornecedor.index', compact('estados'));
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('fornecedores.nome', 'like', "%$request->nome%")
        ->where('email', 'like', "%$request->email%")
        ->where('site', 'like', "%$request->site%")
        ->where('estado_id', "$request->estado_id")
        ->leftJoin('estados','estados.id',  '=', 'fornecedores.estado_id')
        ->select('fornecedores.id', 'fornecedores.nome', 'fornecedores.site', 'email' , 'estados.nome as estado_nome')
        ->orderBy('fornecedores.nome')
        ->paginate(5);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){

        $estados = estados::pluck('nome', 'id');
        $estados[0] = 'UF';
        if($request->input('_token') != ''){
            $dados = $request->all();
            $regrasValidacao = [
                'nome' => 'required|unique:fornecedores,nome',
                'estado_id' => 'gt:0',
                'email' => 'required|email',
                'site' => 'required'
            ];

            $retornoValidacao = [
                'estado_id.gt' => 'Selecione a UF'
            ];
            $request->validate($regrasValidacao, $retornoValidacao);

            $fornecedor = new Fornecedor();
            $fornecedor->fill($dados);
            $fornecedor->save();

            $msgRetorno = 'Cadastro realizado com sucesso';
            return view('app.fornecedor.adicionar', compact('estados', 'msgRetorno'));
        }
        return view('app.fornecedor.adicionar', compact('estados'));
    }

    public function editar($id, Request $request){

        if($request->get('_token')){
            $regrasValidacao = [
                'nome' => 'required',
                'estado_id' => 'gt:0',
                'email' => 'required|email',
                'site' => 'required'
            ];

            $retornoValidacao = [
                'estado_id.gt' => 'Selecione a UF'
            ];

            $request->validate($regrasValidacao, $retornoValidacao);

            $dados = [
                'nome' => $request->get('nome'),
                'estado_id' => $request->get('estado_id'),
                'site' => $request->get('site'),
                'email' => $request->get('email')
            ];

            Fornecedor::where('id', $id)->update($dados);

            return redirect()->route('app.fornecedor');
        }
        $fornecedor = Fornecedor::find($id);
        $estados = estados::pluck('nome', 'id');
        return view('app.fornecedor.form_editar', compact('fornecedor', 'id', 'estados'));
    }

    public function excluir($id){

        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
