<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }

    public function autenticar(Request $request)
    {
        if (!Auth::attempt(request()->except(['_token']))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }

        return to_route('admin.pages'); // estou usando essa view enquanto a view certa nao fica pronta.
    }

    public function destruir()
    {
        Auth::logout();

        return to_route('login');
    }
}
