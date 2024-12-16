<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClienteEndereco;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\PedidoStatus;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(Request $request)
    {
        $query = Pedido::query();

        if(!$request->buscarPedidos && $request->status){
            $query->where('status_id', $request->status);
        }

        if($request->buscarPedidos){
            $query->where('id', $request->buscarPedidos);
        }

        $pedidos = $query->orderByDesc('id')->get();
        $status = PedidoStatus::all();

        return view('admin.pages.pedidos.list', compact('pedidos', 'status'));
    }

    public function show(Pedido $pedido)
    {
        return view('admin.pages.pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        return view('admin.pages.pedidos.form');
    }

    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update([
            'status_id' => $request->input('status_id')
        ]);
        session()->flash('mensagem', value: 'Status do pedido atualizado com sucesso.');

        return redirect('/admin/pedidos');
    }
}
