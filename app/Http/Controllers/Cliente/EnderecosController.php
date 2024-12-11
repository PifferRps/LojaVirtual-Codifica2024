<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\ClienteEndereco;
use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function index()
    {
        return view('meu-endereco');
    }

    public function create()
    {
        return view('ditar-meu-endereco');
    }

    public function store(Request $request)
    {
        ClienteEndereco::create($request->all());

        return redirect()->route('enderecos.index');
    }

    public function edit(string $id)
    {
        return view('site.pages.perfil.editar-meu-endereco', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        $id->update($request->all());

        return redirect()->route('enderecos.index');
    }

    public function destroy(string $id)
    {
        $id->delete();

        return redirect()->route('enderecos.index');
    }
}
