<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class sobreNosController extends Controller
{
    public function sobrenos(){ 
        return view('site.sobrenos');
    }
}
