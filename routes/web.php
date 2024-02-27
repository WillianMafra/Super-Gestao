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
Route::middleware('autenticacao', 'log.acesso')->prefix('/app')->group( function(){

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
    Route::resource('produto', \App\Http\Controllers\produtoController::class);    

    Route::resource('produto-detalhe', \App\Http\Controllers\produtoDetalheController::class);    
    Route::get('/produto-detalhe/create/{id?}', [\App\Http\Controllers\produtoDetalheController::class, 'create'])->name('produto-detalhe.create');

    Route::resource('pedidos', \App\Http\Controllers\pedidoController::class);    
    Route::resource('cliente', \App\Http\Controllers\clienteController::class);    

    Route::resource('pedido-produto', \App\Http\Controllers\pedidoProdutoController::class)->only(['destroy']);   
    Route::get('/pedido-produto/create/{id?}', [\App\Http\Controllers\pedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('/pedido-produto/store/{idPedido?}', [\App\Http\Controllers\pedidoProdutoController::class, 'store'])->name('pedido-produto.store');

});

