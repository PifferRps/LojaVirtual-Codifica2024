<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\ClienteEndereco;
use App\Models\Usuario;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class ClientesController extends Controller
{
    public function index() // tela minha conta
    {
        $usuario = Auth::user();

        return view('site.pages.perfil.form', compact('usuario'));
    }

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
        return view('site.pages.perfil.editar-senha');
    }

    public function atualizarSenha(Request $request)
    {
        $cliente = Auth::user();

        $request->validate(
            [
                'senha_atual' => 'required',
                'nova_senha' => 'required|min:6|confirmed',
            ],
            [
                'nova_senha.confirmed' => 'As senhas não conferem. Por favor, tente novamente.',
            ]
        );

        if (!Hash::check($request['senha_atual'], $cliente->password)){
            $erro = "A senha atual está incorreta. Por favor, tente novamente.";
            session()->flash('erro', $erro);
            return redirect()->route('site.meu-perfil.editar-senha');
        }

        if($request['senha_atual'] === $request['nova_senha']){
            $erro = "A nova senha não pode ser igual à senha antiga. Por favor, escolha uma senha diferente.";
            session()->flash('erro', $erro);
            return redirect()->route('site.meu-perfil.editar-senha');
        }

        $cliente->update(['password' => Hash::make($request['nova_senha'])]);

        return redirect()->route('site.meu-perfil.index');
    }

    public function meusPedidos()
    {
        return view('site.pages.perfil.meus-pedidos');
    }

    public function meusEnderecos()
    {
        $usuario = Auth::user();
        $enderecos = $usuario->cliente->enderecos;

        return view('site.pages.perfil.meus-enderecos', compact('enderecos'));
    }

    public function editarEndereco($idEndereco)
    {
        $usuario = Auth::user();
        $enderecos = $usuario->cliente->enderecos;
        $endereco = $enderecos->find($idEndereco);
        return view('site.pages.perfil.editar-endereco', compact('endereco'));
    }

    public function atualizarEndereco(Request $request)
    {
        ClienteEndereco::findOrFail($request->input('endereco_id'))->update($request->all());

        return redirect()->route('site.meu-perfil.index');
    }

    public function adicionarEndereco()
    {
        $usuario = Auth::user();

        $clienteId = $usuario->cliente['usuario_id'];

        return view('site.pages.perfil.adicionar-endereco', compact('clienteId'));
    }

    public function salvarEndereco(Request $request)
    {
        ClienteEndereco::create($request->all());

        return redirect()->route('site.meu-perfil.index');
    }

}
