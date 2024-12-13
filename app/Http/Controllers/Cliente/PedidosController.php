<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\PedidoStatus;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();

        $query = Pedido::query()->where('cliente_id', $usuario->cliente->id);

        if(!$request->buscarPedidos && $request->status){
            $query->where('status_id', $request->status);
        }

        if($request->buscarPedidos){
            $query->where('id', $request->buscarPedidos);
        }

        $pedidos = $query->get();
        $status = PedidoStatus::all();

        return view('admin.pages.pedidos.list', compact('pedidos', 'status'));
    }

    public function show(Request $request, int $pedidoId)
    {
        $Pedidoproduto = PedidoProduto::where('pedido_id', $pedidoId)->get();

        return view('user.pages.purchase', compact('purchase')); //pagina de pedido especifico não existe ainda
    }

}
