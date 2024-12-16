<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
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

    public function meusPedidos()
    {
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.meus-pedidos', compact('categorias'));
    }

    public function meusEnderecos()
    {
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.meus-enderecos', compact('categorias'));
    }

}
