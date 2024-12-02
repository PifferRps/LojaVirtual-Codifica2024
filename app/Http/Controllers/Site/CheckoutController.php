<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('site.pages.checkout.list');
    }

    public function removerDoCarrinho()
    {
        //
    }

    public function removerTudoDoCarrinho()
    {
        //
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
