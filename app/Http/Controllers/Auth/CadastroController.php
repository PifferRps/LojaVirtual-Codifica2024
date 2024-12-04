<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
//        FALTA TERMINAR A VERIFICAÇÃO:
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
        return redirect()->route('vitrine'); //mais tarde modificar a rota
    }
}
