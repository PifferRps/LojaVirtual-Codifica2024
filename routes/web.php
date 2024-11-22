<?php

use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;

Route::get('/', function () {
    return view('user.site.list');
});

Route::get('/site/create', function () {
    return view('formulario-site');
});

Route::prefix('admin')->group(function () {
    Route::resource('produtos', ProdutosController::class)->names('produtos')->except('show');
    Route::resource('fornecedores', FornecedoresController::class)->names('fornecedores')->except('show');
});

Route::get('/user', function () {
    return view('user._layouts.user');
});

Route::get('/cadastro', function() {
    return view('user.auth.cadastro');
});


Route::post('/cadastro', [CadastroController::class, 'register'])->name('user.auth.cadastro');

Route::post('/cadastro/store', [CadastroController::class, 'store'])->name('user.auth.cadastro');

Route::get('/admin', function () {
    return view('admin.pages.index');
});

Route::get('/admin/categorias', function () {
    return view('admin.pages.categorias.list');
})->name('admin.categorias.list');


Route::get('/admin/categorias/create', function () {
    return view('admin.pages.categorias.form');
});

Route::get('/admin/fornecedor/create', function () {
    return view('admin.pages.fornecedores.form');
});

Route::get('/user/dados', function () {
    return view('user.pages.dados-clientes');

});

Route::get('/api', [\App\Http\Controllers\CepController::class, 'get'])->name('api.get');
Route::post('/api/resultado', [\App\Http\Controllers\CepController::class, 'post'])->name('api.post');

Route::get('/admin/pedidos', function () {
    return view('admin.pages.pedidos.list');
})->name('admin.pedidos.list');

// INICIO: BASE EXEMPLO FUNCIONAL DO MIDDLEWARE
Route::middleware(['auth'])->group(function () {

});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/autenticar', [LoginController::class, 'autenticar'])->name('login.autenticar');
Route::get('/login/destruir', [LoginController::class, 'destruir'])->name('login.destruir');
// FIM: BASE EXEMPLO FUNCIONAL DO MIDDLEWARE

