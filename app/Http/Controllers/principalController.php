<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\motivoContato;

class principalController extends Controller
{
    public function __construct(){
        $this->middleware('log.acesso');
    }

    public function principal(){

        $motivos_contato = motivoContato::pluck('descricao', 'id'); // Traz a array pronta para uso

        // $pluck = [
        //     'id', 'descricao'
        // ];
        return view('site.principal', compact('motivos_contato'));
    }

    public function enviarParametros(int $p1, int $p2){
        $arrayParametros = [
            'p1' => $p1,
            'p2' => $p2
        ];
        return view('site.principal', $arrayParametros);
        return view('site.principal', compact('p1', 'p2')); // metodo compact, gera a mesma coisa que o arrayParametros


    }

}


