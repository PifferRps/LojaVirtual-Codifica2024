<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::where('id', '=', 'cliente_id');
        $pedidos = Pedido::where('cliente_id',$id)->Pedido();
        return view('user.pages.purchases.list', compact('purchases'));
    }

    public function show(Pedido $pedido)
    {
        $Pedidoproduto = PedidoProduto::all();

        return view('user.pages.purchase', compact('purchase'));
    }

}
