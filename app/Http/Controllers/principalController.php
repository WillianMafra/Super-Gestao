<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class principalController extends Controller
{
    public function principal(){
        return view('site.principal');
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


