<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Midlleware
use App\Http\Middleware\logAcessoMiddleware;

// Models
use App\Models\siteContato;
use App\Models\motivoContato;

class contatoController extends Controller
{

    public function __construct()
    {
        $this->middleware('log.acesso');
    }

    public function contato(){

        $motivos_contato = motivoContato::pluck('descricao', 'id');

        return view('site.contato', compact('motivos_contato'));
    }

    public function salvarContato(Request $request){

        $validacao = [
            'nome' => 'required|min:3|max:40',
            'motivo_contatos_id' => 'required',
            'email' => 'email',
            'telefone' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $contato = new siteContato();

        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'motivo_contatos_id' => $request->input('motivo_contatos_id'),
            'mensagem' => $request->input('mensagem'),
            'telefone' => $request->input('telefone'),
        ];

        // Validar os dados

        $request->validate($validacao,
            [ 
            'motivo_contatos_id' => 'O campo motivo contato precisa ser preenchido'
        ]);
        // Caso a validação falhe, irá preencher a variável $errors na view

        // Caso ocorra tudo certo com a validação, irá salvar no banco de dados
        $contato->fill($dados);
        $contato->save();

        return redirect()->route('site.index');

    }
}
