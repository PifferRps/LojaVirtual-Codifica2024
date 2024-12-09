<?php
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\ProdutosController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Cliente\PedidosController;
use App\Http\Controllers\Admin\RelatoriosController;
use App\Http\Controllers\Admin\CategoriasController as AdminCategoriasController;
use App\Http\Controllers\Admin\PedidosController as AdminPedidosController;
use App\Http\Controllers\Admin\ClientesController as AdminClientesController;
use App\Http\Controllers\Cliente\ClientesController as ClienteClientesController;
use App\Http\Controllers\Admin\ProdutosController as AdminProdutosController;
use App\Http\Controllers\Cliente\PedidosController as ClientePedidosController;

Route::get('/', [ProdutosController::class, 'index'])->name('site.pages.vitrine.produtos.list');
Route::get('/produto/{produto}', [ProdutosController::class, 'show'])->name('site.produto.show');
Route::get('/categoria/{categoria}', [ProdutosController::class, 'produtosPorCategoria'])->name('site.porCategoria');
Route::get('/produto/adicionar-ao-carrinho/{id}', [ProdutosController::class, 'adicionarAoCarrinho'])->name('adicionar-ao-carrinho');
Route::get('/carrinho', [CheckoutController::class, 'index'])->name('site.checkout.carrinho');
Route::get('/remover-do-carrinho/{id}', [CheckoutController::class, 'removerDoCarrinho'])->name('remover-do-carrinho');
Route::get('/remover-tudo-do-carrinho', [CheckoutController::class, 'removerTudoDoCarrinho'])->name('remover-tudo-do-carrinho');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/autenticar', [LoginController::class, 'login'])->name('login.autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('/cadastro', CadastroController::class)->only('index', 'store');

Route::middleware(['auth'])->group(function () {
    Route::get('/enderecos', [CheckoutController::class, 'etapaEnderecos'])->name('site.checkout.enderecos');
    Route::get('/pagamento', [CheckoutController::class, 'etapaPagamento'])->name('site.checkout.pagamento');
    Route::get('/confirmacao', [CheckoutController::class, 'etapaConfirmacao'])->name('site.checkout.confirmacao');
    Route::get('/concluido', [CheckoutController::class, 'etapaConcluido'])->name('site.checkout.concluido');

    Route::prefix('meu-perfil')->group(function () {
        Route::get('/', [ClienteClientesController::class, 'index'])->name('site.meu-perfil.index');
        Route::get('/editar-dados', [ClienteClientesController::class, 'edit'])->name('site.meu-perfil.edit');
        Route::get('/editar-dados/salvar', [ClienteClientesController::class, 'update'])->name('site.meu-perfil.update');
        Route::get('/meus-pedidos', [ClienteClientesController::class, 'meusPedidos'])->name('site.meu-perfil.pedidos');
        Route::get('/meus-enderecos', [ClienteClientesController::class, 'meusEnderecos'])->name('site.meu-perfil.enderecos');
        Route::get('/editar-senha', [ClienteClientesController::class, 'editarSenha'])->name('site.meu-perfil.editar-senha');
    });

    Route::middleware([Admin::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('/', DashboardController::class)->except('show')->names('dashboard');
            Route::resource('produtos', AdminProdutosController::class)->except('show');
            Route::resource('pedidos', AdminPedidosController::class)->except('create', 'store');
            Route::resource('clientes', AdminClientesController::class)->except('show', 'create', 'store', 'destroy');
            Route::resource('categorias', AdminCategoriasController::class)->except('show');
            Route::resource('relatorios', RelatoriosController::class)->except('show');
        });
    });
});
