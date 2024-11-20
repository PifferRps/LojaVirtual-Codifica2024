<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }

    public function auth(Request $request)
    {
        // caso queira se aventurar, o cartão #79 é referente a essa função.
        dd($request->all());
    }
}
