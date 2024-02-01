<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect para página inicial quando o endereco solitado nn existe
Route::fallback( function (){
    return redirect()->route('site.index');
});

Route::get('/', [\App\Http\Controllers\principalController::class, 'principal'])->name('site.index');

Route::get('sobrenos', [\App\Http\Controllers\sobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('contato', [\App\Http\Controllers\contatoController::class, 'contato'])->name('site.contato');
Route::post('contato', [\App\Http\Controllers\contatoController::class, 'contato'])->name('site.contato');
Route::get('/login', [\App\Http\Controllers\contatoController::class, 'contato'])->name('site.login');

// Agrupar rotas com o prefixo /app
Route::prefix('/app')->group( function(){
    Route::get('/clientes', [\App\Http\Controllers\contatoController::class, 'contato'])->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\fornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', [\App\Http\Controllers\contatoController::class, 'contato'])->name('app.produtos');    
});

// Passando variaveis via get, onde codigo aceita apenas 0 até 9 e nome apenas string, o + diz que é necessário pelo menos 1 valor 
// Route::get('/contato/{nome}/{codigo}',
//     function (
//         string $nome,
//         int $codigo
//     )  {
//         echo $nome . $codigo;  
//     }
// )->where('codigo', '[0-9]+')->where('nome', '[A-Za-z]+');