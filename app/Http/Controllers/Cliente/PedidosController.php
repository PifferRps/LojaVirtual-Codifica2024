<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Pedido::where('cliente_id', auth()->id());
        
            if ($search) {
            $query->where('id', $search);
        }
    
        $pedidos = $query->get();
        return view('site.pages.pedidos.list', compact('pedidos'));
    }

    public function show(Request $request, int $pedidoId)
    {
        $Pedidoproduto = PedidoProduto::where('pedido_id', $pedidoId)->get();

        return view('user.pages.purchase', compact('purchase')); //pagina de pedido especifico não existe ainda
    }

}
