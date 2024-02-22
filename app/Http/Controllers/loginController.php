<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Models

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('log.acesso');
    }

    public function index(Request $request){
        $erroLogin = $request->get('erroLogin');
        return view('site.login', ['titulo' => 'Login', 'erroLogin' => $erroLogin]);
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

        $credenciais = [
            'email' => $request->input('usuario'),
            'password' => $request->input('senha')
        ];

        // Tentar a autenticacao do usuário
        if (Auth::attempt($credenciais)) {
            $request->session()->put('autenticado', true);
            return redirect()->route('app.home');
        } else {
            $request->session()->invalidate();
            $erroLogin = 'Usuário ou senha inválido';
            $request->session()->put('erroSessao', $erroLogin);

            return redirect()->route('site.login', ['erroLogin' => $erroLogin]);
        }
    }

    public function sair(Request $request){
        $request->session()->invalidate();
        return redirect()->route('site.login');
    }
}
