<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function index() // tela minha conta
    {
        $cliente = Auth::user();
        return view('site.pages.perfil.list', compact('cliente'));
    }

    public function edit() // tela de edição de dados
    {
        $cliente = Auth::user();
        return view('site.pages.perfil.form', compact('cliente'));
    }

    public function update(Request $request) //atualiza dados cliente
    {
        $cliente = Auth::user();
    /**    $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email' . $cliente->id
        ]);
    */

//        $cliente->update([
//            'name' => $request->name,
//            'email' => $request->email,
//        ]);

        return redirect()->route('site.meu-perfil.index'); //retorna a tela minha conta
    }


    public function editarSenha() // tela edição d e senha
    {
        return view('site.pages.perfil.editar-senha');
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
        return view('site.pages.perfil.meus-pedidos');
    }

    public function meusEnderecos()
    {
        return view('site.pages.perfil.meus-enderecos');
    }

}
