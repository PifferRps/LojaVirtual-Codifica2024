<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('admin.pages.index', compact('produtos'));
    }

    public function create()
    {
        return view('admin.pages.formulario-produtos');
    }

    public function store(Request $request)
    {
        Produto::create($request->all());

        return redirect()->route('produtos.index');
    }
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index');
    }

}

