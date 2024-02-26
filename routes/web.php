<?php

use App\Http\Middleware\logAcessoMiddleware;
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

Route::get('/', [\App\Http\Controllers\principalController::class, 'principal'])
->name('site.index');

Route::get('sobrenos', [\App\Http\Controllers\sobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('contato', [\App\Http\Controllers\contatoController::class, 'contato'])->name('site.contato');
Route::post('contato', [\App\Http\Controllers\contatoController::class, 'salvarContato'])->name('site.contato');

Route::get('/login/{erroLogin?}', [\App\Http\Controllers\loginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\loginController::class, 'autenticar'])->name('site.login');

// Agrupar rotas com o prefixo /app
Route::middleware('autenticacao')->prefix('/app')->group( function(){
    Route::get('/clientes', [\App\Http\Controllers\clienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedores', [\App\Http\Controllers\fornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedores/adicionar', [\App\Http\Controllers\fornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedores/adicionar', [\App\Http\Controllers\fornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedores/listar', [\App\Http\Controllers\fornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedores/listar/{page?}', [\App\Http\Controllers\fornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedores/editar/{id}', [\App\Http\Controllers\fornecedorController::class, 'editar'])->name('app.fornecedor.form_editar');
    Route::get('/fornecedores/editar/{id}', [\App\Http\Controllers\fornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::post('/fornecedores/editar/{id}', [\App\Http\Controllers\fornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedores/excluir/{id}', [\App\Http\Controllers\fornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
  
    Route::get('/sair', [\App\Http\Controllers\loginController::class, 'sair'])->name('app.sair');    
    Route::get('/home', [\App\Http\Controllers\homeController::class, 'index'])->name('app.home'); 

    Route::resource('produto', \App\Http\Controllers\produtoController::class);    

    Route::resource('produto-detalhe', \App\Http\Controllers\produtoDetalheController::class);    
});

