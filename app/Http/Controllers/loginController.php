<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('log.acesso');
    }

    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        $regrasValidacao = [
            'usuario' => 'email',
            'senha' => 'required|min:8'
        ];
        
        $retornoValidacao = [
            'usuario.email' => 'O campo usuário não contém um endereço de e-mail válido',
            'senha.required' => 'O campo senha precisa ser preenchido',
            'senha.min' => 'O campo senha precisa ter no mínimo 8 caracteres'
        ];

        $request->validate($regrasValidacao, $retornoValidacao);

        dd($request);
    }
}
