<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(request()->except(['_token']))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }

        return to_route('user.site.list'); // estou usando essa view enquanto a view certa nao fica pronta.
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
