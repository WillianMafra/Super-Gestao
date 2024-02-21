<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\siteContato;

class contatoController extends Controller
{
    public function contato(){

        $motivos_contato = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        return view('site.contato', compact($motivos_contato));
    }

    public function salvarContato(Request $request){

        $contato = new siteContato();

        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'motivo_contato' => $request->input('motivo_contato'),
            'mensagem' => $request->input('mensagem'),
            'telefone' => $request->input('telefone'),
        ];

        // Validar os dados

        $validacao = [
            'nome' => 'required|min:3|max:40',
            'motivo_contato' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $request->validate($validacao);
        // Caso a validação falhe, irá preencher a variável $errors na view

        // Caso ocorra tudo certo com a validação, irá salvar no banco de dados
        $contato->fill($dados);
        $contato->save();

    }
}
