<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ClienteEndereco;
use App\Models\Usuario;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function index()
    {
        return view('site.auth.cadastro');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:usuarios,email',
                'cpf' => 'required|unique:usuarios_clientes,cpf',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            ],
            [
                'email.unique' => 'Email indisponível',
                'email.email' => 'Email incorreto',
                'cpf.unique' => 'CPF indisponível',
                'name.min' => 'O nome deve conter pelo menos 3 caracteres',
                'name.max' => 'O nome deve conter no máximo 50 caracteres',
                'password.min' => 'A senha deve conter pelo menos 6 caracteres.',
                'password.same' => 'As senhas devem coincidir.',
            ]
        );

        $user = Usuario::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_level' => '1'
        ]);

        $cliente = UsuarioCliente::create([
            'usuario_id' => $user->id,
            'nome' => $request->name,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data,
        ]);

        ClienteEndereco::create([
            'cliente_id' => $cliente->id,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'complemento' => $request->complemento,
            'referencia' => $request->referencia,
        ]);

        Auth::login($user);
        return redirect()->route('site.pages.vitrine.produtos.list');
    }
}
