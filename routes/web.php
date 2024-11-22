<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', function () {
    return view('produtos.produtos-home');
});

Route::get('/produtos/create', function () {
    return view('formulario-produtos');
});

Route::prefix('admin')->group(function () {
    Route::resource('produtos', ProdutosController::class)->names('produtos')->except('show');

});

Route::get('/user', function () {
    return view('user._layouts.user');
});

Route::get('/cadastro', function() {
    return view('user.auth.cadastro');
});
Route::post('/cadastro/store', [CadastroController::class, 'store'])->name('user.auth.cadastro');

Route::get('/admin', function () {
    return view('admin.pages.index');
});

Route::get('/admin/categorias', function () {
    return view('admin.pages.categorias');
});


Route::get('/admin/categorias/create', function () {
    return view('admin.pages.criar-categorias');
});

Route::get('/admin/fornecedor/create', function () {
    return view('admin.pages.formaluario-fornecedor');
});

Route::get('/admin/pedidos', function () {
    return view('admin.pages.pedidos.list');

});

Route::get('/user/dados', function () {
    return view('user.pages.dados-clientes');

});

Route::get('/api', [\App\Http\Controllers\CepController::class, 'get'])->name('api.get');
Route::post('/api/resultado', [\App\Http\Controllers\CepController::class, 'post'])->name('api.post');

// INICIO: BASE EXEMPLO FUNCIONAL DO MIDDLEWARE
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pedidos', function () {
        return view('admin.pages.pedidos.list');
    })->name('admin.pages');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/autenticar', [LoginController::class, 'autenticar'])->name('login.autenticar');
Route::get('/login/destruir', [LoginController::class, 'destruir'])->name('login.destruir');
// FIM: BASE EXEMPLO FUNCIONAL DO MIDDLEWARE

