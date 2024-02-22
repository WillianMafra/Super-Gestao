<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Middleware
use App\Http\Middleware\logAcessoMiddleware;

class sobreNosController extends Controller
{
    public function __construct(){
        $this->middleware('log.acesso');
        $this->middleware('autenticacao'); // Usado apelido pois o middleware foi definido no kernel.php
    }

    public function sobrenos(){ 
        return view('site.sobrenos');
    }
}
