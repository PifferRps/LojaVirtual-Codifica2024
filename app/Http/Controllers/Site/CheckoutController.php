<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FormaPagamento;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function getValores()
    {
        $produtos = session('produtos');
        $valorTotal = 0;
        if (!empty($produtos)) {
            foreach ($produtos as $produto) {
                $valor = $produto['produto']->valor;
                $quantidade = $produto['quantidade'];
                $valorTotal = $valor * $quantidade + $valorTotal;
            }
        }

        $valorDescontoPix = $valorTotal - $valorTotal * (10 / 100);
        $valorParcelado = $valorTotal / 10;

        $valores[] = [
            'valorTotal' => $valorTotal,
            'valorParcelado' => $valorParcelado,
            'valorDescontoPix' => $valorDescontoPix,
        ];

        return $valores;
    }

    public function index()
    {
        $produtos = session('produtos');
        $valores = $this->getValores();

        return view('site.pages.checkout.list', compact('produtos', 'valores'));
    }

    public function removerDoCarrinho($id)
    {
        session()->forget('produtos.' . $id);

        if (!session('produtos')) {
            return redirect('/');
        }
        session()->flash('mensagem', value: 'Produto removido do carrinho.');

        return redirect()->back();
    }

    public function removerTudoDoCarrinho()
    {
        session()->forget('produtos');

        return redirect('/');
    }

    public function alterarQuantidadeProduto(Request $request)
    {

        $produtos = session('produtos', []);

        foreach ($request->input('carrinho_atualizado') as $id => $quantidade) {
            $produtos[$id]['quantidade'] = $quantidade;
        }

        session(['produtos' => $produtos]);

        return redirect()->back();
    }

    public function etapaEnderecos()
    {
        $usuario = Auth::user();

        $enderecos = $usuario->cliente->enderecos->toArray();

        $valores = $this->getValores();

        return view('site.pages.checkout.form', compact('enderecos', 'valores'));
    }

    public function salvarEndereco(Request $request)
    {
        $idEndereco = $request->id;
        $frete = $request->frete;
        session(['endereco' => $idEndereco]);
        session(['frete' => $frete]);
        $valores = $this->getValores();

        return to_route('site.checkout.pagamento');
    }

    public function etapaPagamento()
    {
        $valores = $this->getValores();

        $frete = session('frete');

        return view('site.pages.checkout.pagamento', compact('valores', 'frete'));
    }

    public function salvarPagamento(Request $request)
    {
        $pagamento = $request['payment_method'];
        if ($request['payment_method'] == '3') {
            $vezes = $request['vezes'];
            session(['vezes' => $vezes]);
        }

        session(['pagamento' => $pagamento]);

        return to_route('site.checkout.confirmacao');
    }

    public function etapaConfirmacao()
    {
        $formasDePagamento = FormaPagamento::all()
            ->pluck('nome', 'id')
            ->toArray();

        $frete = session('frete');
        $idEndereco = session('endereco');
        $idPagamento = session('pagamento');
        $pagamento = $formasDePagamento[$idPagamento];
        $vezes = session('vezes');
        $produtos = session('produtos');
        $valores = $this->getValores();
        $id = Auth::id();
        $cliente = UsuarioCliente::where('usuario_id', $id)->first();
        $enderecos = $cliente->enderecos->toArray();

        return view('site.pages.checkout.confirmacao', compact('valores', 'frete', 'cliente', 'enderecos', 'produtos', 'vezes', 'pagamento', 'idEndereco', 'idPagamento'));
    }

    public function salvarPedido()
    {
        $usuario = Auth::user();
        $valor_total = 0;
        $desconto = 0;

        foreach(session('produtos') as $item){
            $valor_total += ($item['produto']->valor * $item['quantidade']);
        }

        if(session('pagamento') == 1){
            $desconto = ($valor_total * 0.1);
        }

        $valor_final = $valor_total - $desconto + session('frete');

        $pedido = Pedido::create([
            'data_transacao' => date('Y-m-d'),
            'cliente_id' => $usuario->cliente->id,
            'endereco_id' => session('endereco'),
            'status_id' => 4,
            'forma_pagamento_id' => session('pagamento'),
            'valor_total' => $valor_total,
            'desconto_total' => $desconto,
            'valor_frete' => session('frete'),
            'valor_final' => $valor_final,
            'parcelas' => session('vezes')
        ]);

        foreach(session('produtos') as $item){
            $item['produto']->update(['quantidade' => ($item['produto']->quantidade - $item['quantidade'])]);

            PedidoProduto::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $item['produto']->id,
                'quantidade_vendida' => $item['quantidade']
            ]);
        }

        session()->forget([
            'produtos',
            'endereco',
            'frete',
            'vezes',
            'pagamento'
        ]);

        return to_route('site.checkout.concluido');
    }

    public function etapaConcluido()
    {
        return view('site.pages.checkout.concluido');
    }
}
