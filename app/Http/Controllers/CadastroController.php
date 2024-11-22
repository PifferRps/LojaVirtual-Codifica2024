<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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
            'user_level' => '1',
        ]);

        Auth::login($user);
        return redirect()->route('home'); //mais tarde modificar a rota
    }
}
