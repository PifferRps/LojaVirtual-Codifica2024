<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class CheckoutController extends Controller
{
    public function index()
    {
        $produtos = session('produtos');
        $valorTotal = 0;
        if (!empty($produtos)) {
            foreach ($produtos as $produto) {
                $valor = $produto['produto']->valor;
                $quantidade = $produto['quantidade'];
                $valorTotal = $valor*$quantidade + $valorTotal;
            }
        }


        $valorDescontoPix = $valorTotal-$valorTotal*(10/100);
        $valorParcelado = $valorTotal/10;



        return view('site.pages.checkout.list',compact('produtos', 'valorTotal', 'valorDescontoPix', 'valorParcelado'));
    }

    public function removerDoCarrinho($id)
    {

        session()->forget('produtos.' .$id);
        if (!session('produtos')){
            return redirect('/');
        } return redirect()->back();
    }

    public function removerTudoDoCarrinho()
    {
        session()->forget('produtos');
        return redirect('/');
    }

    public function etapaEnderecos()
    {
        return view('site.pages.checkout.form');
    }

    public function etapaPagamento()
    {
        return view('site.pages.checkout.pagamento');
    }

    public function etapaConfirmacao()
    {
        return view('site.pages.checkout.confirmacao');
    }

    public function etapaConcluido()
    {
        return view('site.pages.checkout.concluido');
    }
}
