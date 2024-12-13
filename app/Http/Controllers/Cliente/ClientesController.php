<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoStatus;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function index() // tela minha conta
    {
        $usuario = Auth::user();
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.form', compact('usuario', 'categorias'));
    }

//    public function edit() // tela de edição de dados
//    {
//        $cliente = Auth::user();
//        return view('site.pages.perfil.form', compact('cliente'));
//    }

    public function update(Request $request) //atualiza dados cliente
    {
        $usuario = Auth::user();

        if ($usuario->email != $request->input('email')) {
            $usuario->update($request->only(['email']));
        }

        $usuario->cliente->update([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'data_nascimento' => $request->input('data_nascimento'),
        ]);

        return redirect()->route('site.meu-perfil.index'); //retorna a tela minha conta
    }


    public function editarSenha() // tela edição d e senha
    {
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.editar-senha', compact('categorias'));
    }

    public function atualizarSenha(Request $request)
    {
        $cliente = Auth::user();

        $request->validate([
            'senha_atual' => 'required',
            'nova_senha' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->senha_atual, $cliente->password)) {
            return back()->withErrors(['senha_atual' => 'Senha atual incorreta']);
        }

        $cliente->update([
            'password' => Hash::make($request->nova_senha),
        ]);

        return redirect()->route('clientes.index');
    }

    public function meusPedidos(Request $request)
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
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.meus-pedidos', compact('categorias', 'status', 'pedidos'));
    }

    public function pedidoShow(Pedido $pedido)
    {
        $usuario = Auth::user();
//        dd($usuario->cliente->id == $pedido->cliente_id);
        if (!$usuario->cliente->pedidos()->where('id', $pedido->id)->exists()){
            return redirect('/meu-perfil/meus-pedidos');
        }

        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.pedido', compact('pedido', 'categorias'));
    }

    public function meusEnderecos()
    {
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.meus-enderecos', compact('categorias'));
    }

}
