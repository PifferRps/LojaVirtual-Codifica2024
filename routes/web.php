<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cliente\EnderecosController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\ProdutosController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RelatoriosController;
use App\Http\Controllers\Admin\CategoriasController as AdminCategoriasController;
use App\Http\Controllers\Admin\PedidosController as AdminPedidosController;
use App\Http\Controllers\Admin\ClientesController as AdminClientesController;
use App\Http\Controllers\Cliente\ClientesController as ClienteClientesController;
use App\Http\Controllers\Admin\ProdutosController as AdminProdutosController;

Route::get('/', [ProdutosController::class, 'index'])->name('site.pages.vitrine.produtos.list');
Route::get('/produto/{produto}', [ProdutosController::class, 'show'])->name('site.produto.show');
Route::get('/categoria/{categoria}', [ProdutosController::class, 'produtosPorCategoria'])->name('site.porCategoria');
Route::get('/produto/adicionar-ao-carrinho/{id}', [ProdutosController::class, 'adicionarAoCarrinho'])->name('adicionar-ao-carrinho');
Route::get('/carrinho', [CheckoutController::class, 'index'])->name('site.checkout.carrinho');
Route::get('/carrinho/adicionar', [CheckoutController::class, 'alterarQuantidadeProduto'])->name('site.checkout.carrinho-alterarquantidade');
Route::get('/remover-do-carrinho/{id}', [CheckoutController::class, 'removerDoCarrinho'])->name('remover-do-carrinho');
Route::get('/remover-tudo-do-carrinho', [CheckoutController::class, 'removerTudoDoCarrinho'])->name('remover-tudo-do-carrinho');
Route::get('/pesquisa', [ProdutosController::class,'pesquisaProdutos'])->name('site.pages.vitrine.produtos.pesquisa');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/autenticar', [LoginController::class, 'login'])->name('login.autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('/cadastro', CadastroController::class)->only('index', 'store');
//Route::resource('enderecos', EnderecosController::class);

Route::middleware(['auth'])->group(function () {

    Route::get('/enderecos', [CheckoutController::class, 'etapaEnderecos'])->name('site.checkout.enderecos');
    Route::post('/enderecos/salvar', [CheckoutController::class, 'salvarEndereco'])->name('site.checkout.enderecos.salvar');
    Route::get('/pagamento', [CheckoutController::class, 'etapaPagamento'])->name('site.checkout.pagamento');
    Route::post('/pagamento/salvar', [CheckoutController::class, 'salvarPagamento'])->name('site.checkout.pagamento.salvar');
    Route::get('/confirmacao', [CheckoutController::class, 'etapaConfirmacao'])->name('site.checkout.confirmacao');
    Route::get('/pedido/salvar', [CheckoutController::class, 'salvarPedido'])->name('site.checkout.salvar');
    Route::get('/concluido', [CheckoutController::class, 'etapaConcluido'])->name('site.checkout.concluido');

    Route::prefix('meu-perfil')->group(function () {
        Route::get('/', [ClienteClientesController::class, 'index'])->name('site.meu-perfil.index');
        Route::put('/editar-dados/salvar/{usuario}', [ClienteClientesController::class, 'update'])->name('site.meu-perfil.update');
        Route::get('/meus-pedidos', [ClienteClientesController::class, 'meusPedidos'])->name('site.meu-perfil.pedidos');
        Route::get('/pedido/{pedido}', [ClienteClientesController::class, 'pedidoShow'])->name('site.meu-perfil.pedido-show');
        Route::resource('produtos', ClienteClientesController::class)->except('show');
        Route::get('/meus-enderecos', [ClienteClientesController::class, 'meusEnderecos'])->name('site.meu-perfil.enderecos');
        Route::get('/meus-enderecos/editar/{endereco}', [ClienteClientesController::class, 'editarEndereco'])->name('site.meu-perfil.editar-endereco');
        Route::put('/meus-enderecos/editar/salvar', [ClienteClientesController::class, 'atualizarEndereco'])->name('site.meu-perfil.atualizar-endereco');
        Route::get('/meus-enderecos/adicionar-endereco', [ClienteClientesController::class, 'adicionarEndereco'])->name('site.meu-perfil.adicionar-endereco');
        Route::post('/meus-enderecos/adicionar-endereco/salvar', [ClienteClientesController::class, 'salvarEndereco'])->name('site.meu-perfil.salvar-endereco');
        Route::delete('/meus-enderecos/deletar-endereco/{id}', [ClienteClientesController::class, 'deletarEndereco'])->name('site.meu-perfil.deletar-endereco');
        Route::get('/editar-senha', [ClienteClientesController::class, 'editarSenha'])->name('site.meu-perfil.editar-senha');
        Route::post('/editar-senha/atualizar', [ClienteClientesController::class, 'atualizarSenha'])->name('site.meu-perfil.salvar-senha');
    });

    Route::middleware([Admin::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('/', DashboardController::class)->except('show')->names('dashboard');
            Route::resource('produtos', AdminProdutosController::class)->except('show');
            Route::resource('pedidos', AdminPedidosController::class)->except('create', 'store');
            Route::resource('clientes', AdminClientesController::class)->except('show', 'create', 'store', 'destroy');
            Route::resource('categorias', AdminCategoriasController::class)->except('show');
            Route::prefix('relatorios')->group(function () {
                Route::get('/', [RelatoriosController::class, 'index'])->name('relatorios.index');

                Route::get('/estoque-atual', [RelatoriosController::class, 'paginaEstoqueAtual'])->name('relatorios.estoque-atual');
                Route::post('/estoque-atual/gerar', [RelatoriosController::class, 'gerarPdfEstoqueAtual'])->name('relatorios.estoque-atual.gerar');

                Route::get('/vendas', [RelatoriosController::class, 'paginaVendas'])->name('relatorios.vendas');
                Route::post('/vendas/gerar', [RelatoriosController::class, 'gerarPdfVendas'])->name('relatorios.vendas.gerar');

                Route::get('/mais-vendidos', [RelatoriosController::class, 'paginaMaisVendidos'])->name('relatorios.mais-vendidos');
                Route::post('/mais-vendidos/gerar', [RelatoriosController::class, 'gerarPdfMaisVendidos'])->name('relatorios.mais-vendidos.gerar');
            });
        });
    });
});
