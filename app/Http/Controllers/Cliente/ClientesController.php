<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoStatus;
use App\Models\ProdutoCategoria;
use App\Models\ClienteEndereco;
use App\Models\Usuario;
use App\Models\UsuarioCliente;
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

        $pedidos = $query->orderByDesc('id')->get();
        $status = PedidoStatus::all();
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.meus-pedidos', compact('categorias', 'status', 'pedidos'));
    }

    public function pedidoShow(Pedido $pedido)
    {
        $usuario = Auth::user();

        if (!$usuario->cliente->pedidos()->where('id', $pedido->id)->exists()){
            return redirect('/meu-perfil/meus-pedidos');
        }

        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.pedido', compact('pedido', 'categorias'));
    }

    public function meusEnderecos()
    {
        $categorias = ProdutoCategoria::all();

        $usuario = Auth::user();
        $enderecos = $usuario->cliente->enderecos;

        return view('site.pages.perfil.meus-enderecos', compact('enderecos', 'categorias'));
    }

    public function editarEndereco($idEndereco)
    {
        $usuario = Auth::user();
        $enderecos = $usuario->cliente->enderecos;
        $endereco = $enderecos->find($idEndereco);
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.editar-endereco', compact('endereco', 'categorias'));
    }

    public function atualizarEndereco(Request $request)
    {
        ClienteEndereco::findOrFail($request->input('endereco_id'))->update($request->all());

        return redirect()->route('site.meu-perfil.enderecos');
    }

    public function adicionarEndereco()
    {
        $usuario = Auth::user();

        $clienteId = $usuario->cliente->id;
        $categorias = ProdutoCategoria::all();

        return view('site.pages.perfil.adicionar-endereco', compact('clienteId', 'categorias'));
    }

    public function salvarEndereco(Request $request)
    {
        ClienteEndereco::create($request->all() + ['valor_frete' => rand(1500, 2500) / 100]);

        return redirect()->route('site.meu-perfil.enderecos');
    }

    public function deletarEndereco($id)
    {
        $endereco = ClienteEndereco::find($id);
        $endereco->delete();

        return redirect()->route('site.meu-perfil.enderecos');
    }
}
