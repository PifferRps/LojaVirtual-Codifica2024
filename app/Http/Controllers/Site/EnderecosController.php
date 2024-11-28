<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClienteEndereco;
use App\Models\UsuarioCliente;

class EnderecosController extends Controller
{
    public function index()
    {
        $endereco = ClienteEndereco::all(); //por enquanto ele puxa todos os pedidos
        //$clienteId = Auth::guard('cliente')->user()->cliente_id;
        //$cliente = UsuarioCliente::findOrFail($clienteId);
        //$endereco = ClienteEndereco::where('cliente_id', $clienteId)->get();

        //precisa do login funcionando
        return view('user.pages.cart.list', compact('cart'));
    }

    public function create()
    {
        return view('user.pages.cart.form', compact('form')); // não existe ainda
    }

    public function store(Request $request)
    {
        ClienteEndereco::create($request->all());

        return view('user.pages.cart.list', compact('cart')); 
    }

    public function edit(ClienteEndereco $endereco)
    {
        return view('user.pages.cart.form', compact('form')); // não existe ainda
    }

    public function update(Request $request, ClienteEndereco $endereco)
    {
        $endereco->update($request->all());

        return view('user.pages.cart.list', compact('cart')); 
    }

    public function destroy(ClienteEndereco $endereco)
    {
        $endereco->delete();

        return view('user.pages.cart.list', compact('cart')); 
    }
}
