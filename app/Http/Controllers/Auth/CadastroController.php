<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function index()
    {
        return view('user.auth.cadastro');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'email' => 'required|email|unique:usuarios,email',
//            'password' => 'required|confirmed|min:6',
//        ]);

        $user = Usuario::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'user_level' => '2',
        ]);

        $cliente = UsuarioCliente::create([
            'usuario_id' => $user->id,
            'nome' => $request->name,
            'documento' => $request->account_type == 'fisica' ? $request->cpf : $request->cnpj,
        ]);

        Auth::login($user);
        return redirect()->route('home'); //mais tarde modificar a rota
    }
}
