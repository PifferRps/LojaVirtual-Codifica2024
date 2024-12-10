<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = UsuarioCliente::all();

        return view('admin.pages.clientes.list', compact('clientes'));
    }

    public function edit(UsuarioCliente $cliente)
    {
        $usuario = Usuario::all();

        return view('admin.pages.clientes.form', compact('cliente', 'usuario'));
    }

    public function update(Request $request, UsuarioCliente $cliente)
    {
        $dadosUsuario = [
            'email' => $request->post('email')
        ];

        if (!empty($request->post('senha'))) {
            $dadosUsuario['password']  = Hash::make($request->post('senha'));
        }

        $cliente->usuario()->update($dadosUsuario);

        $cliente->update([
            'nome' => $request->post('nome'),
            'documento' => $request->post('documento'),
        ]);

        return redirect()->route('clientes.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
