<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\logAcessoMiddleware;

class fornecedorController extends Controller
{

    public function __construct(){
        $this->middleware('log.acesso');
    }

    public function index(){
        return view('app.fornecedor.index');
    }
}
