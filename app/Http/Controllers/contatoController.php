<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\siteContato;

class contatoController extends Controller
{
    public function contato(Request $request){
        
        $contato = new siteContato();

        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'motivo_contato' => $request->input('motivo_contato'),
            'mensagem' => $request->input('mensagem'),
            'telefone' => $request->input('telefone'),
        ];

        $contato->fill($dados);
        $contato->save();

        
        return view('site.contato');
    }
}
