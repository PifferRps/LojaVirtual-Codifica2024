<?php

use App\Http\Controllers\API\CepController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Admin\FornecedoresController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProdutosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\ClientesController;

Route::get('/', function () {
    return view('user.site.list');
})->name('home');

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

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dados', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/dados/editar', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/dados', [ClientesController::class, 'update'])->name('clientes.update');
    Route::get('/senha/editar', [ClientesController::class, 'editarSenha'])->name('clientes.editarSenha');
    Route::put('/senha', [ClientesController::class, 'atualizarSenha'])->name('clientes.atualizarSenha');
});

Route::get('/cadastro', function() {
    return view('user.auth.cadastro');
});

Route::post('/cadastro', [CadastroController::class, 'register'])->name('user.auth.criar');

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

Route::get('/api', [CepController::class, 'get'])->name('api.get');
Route::post('/api/resultado', [CepController::class, 'post'])->name('api.post');

Route::get('/admin/pedidos', function () {
    return view('admin.pages.pedidos.list');
})->name('admin.pedidos.list');

// INICIO: BASE EXEMPLO FUNCIONAL DO MIDDLEWARE
Route::middleware(['auth'])->group(function () {

});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/autenticar', [LoginController::class, 'autenticar'])->name('login.autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// FIM: BASE EXEMPLO FUNCIONAL DO MIDDLEWARE

Route::get('/profile', function () {
    return view('user.pages.profile.form');
})->name('profile');

Route::get('/cart', function () {
    return view('user.pages.cart.list');
})->name('cart');

Route::get('/purchases', function () {
    return view('user.pages.purchases.list');
})->name('purchases');

Route::get('/admin/clientes', function () {
    return view('admin.pages.clientes.list');
})->name('admin.categorias.list');


Route::get('/pedidos/teste', function () {
    return view('user.pages.purchases.info');
});

Route::get('/categoria', function () {
    return view('user.site.list-por-categoria');
})->name('home');

