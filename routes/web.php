<?php

use App\Http\Controllers\Admin\RelatoriosController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\ProdutosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriasController as AdminCategoriasController;
use App\Http\Controllers\Admin\PedidosController as AdminPedidosController;
use App\Http\Controllers\Admin\ClientesController as AdminClientesController;
use App\Http\Controllers\Admin\FornecedoresController as AdminFornecedoresController;
use App\Http\Controllers\Admin\ProdutosController as AdminProdutosController;

Route::get('/', function () {
    return view('site.pages.vitrine.produtos.list');
})->name('vitrine');

Route::get('/categoria/{id_categoria?}', function (?int $id_categoria = null) {
    return ProdutosController::produtosPorCategoria($id_categoria);
})->name('site.porCategoria');

Route::get('/produto/{id_produtos?}', function (?int $id_produtos = null) {
    return ProdutosController::show($id_produtos);
})->name('site.produto');

Route::get('/carrinho', [CheckoutController::class, 'index'])->name('site.checkout.carrinho');

Route::get('/enderecos', [CheckoutController::class, 'etapaEnderecos'])->name('site.checkout.enderecos');

Route::get('/pagamento', [CheckoutController::class, 'etapaPagamento'])->name('site.checkout.pagamento');

Route::get('/confirmacao', [CheckoutController::class, 'etapaConfirmacao'])->name('site.checkout.confirmacao');

Route::get('/concluido', [CheckoutController::class, 'etapaConcluido'])->name('site.checkout.concluido');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/autenticar', [LoginController::class, 'login'])->name('login.autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('/cadastro', CadastroController::class)->only('index', 'store');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/relatorios', [RelatoriosController::class, 'index'])->name('admin.relatorios.index');

        Route::resource('produtos', AdminProdutosController::class)->except('show');
        Route::resource('pedidos', AdminPedidosController::class)->except('create', 'store');
        Route::resource('fornecedores', AdminFornecedoresController::class)->except('show');
        Route::resource('clientes', AdminClientesController::class)->except('show', 'create', 'store');
        Route::resource('categorias', AdminCategoriasController::class)->except('show');
    });
});
