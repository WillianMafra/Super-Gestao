<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sobreNosController extends Controller
{
    public function sobrenos(){ 
        return view('site.sobrenos');
    }
}
