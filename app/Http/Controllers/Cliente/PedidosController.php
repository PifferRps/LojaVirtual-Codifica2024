<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {

        $pedido = Pedido::all(); //por enquanto ele puxa todos os pedidos
        //$clienteId = Auth::guard('cliente')->user()->cliente_id;
        //$cliente = UsuarioCliente::findOrFail($clienteId);
        //$pedido = Pedido::where('cliente_id', $clienteId)->where('status', Status::Ativo)->get();

        //precisa do login funcionando
        return view('user.pages.purchases.list', compact('purchases'));
    }

    public function show(Request $request, int $pedidoId)
    {
        $Pedidoproduto = PedidoProduto::where('pedido_id', $pedidoId)->get();

        return view('user.pages.purchase', compact('purchase')); //pagina de pedido especifico não existe ainda
    }

}
