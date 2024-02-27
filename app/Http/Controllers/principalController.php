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

        return view('site.principal', compact('motivos_contato'));
    }

}


