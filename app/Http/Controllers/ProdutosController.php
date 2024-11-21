<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('admin.pages.produtos.list', compact('produtos'));
    }

    public function create()
    {
        return view('admin.pages.produtos.form');
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

    public function edit(Produto $produto)
    {
        return view('admin.pages.produtos.form', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }

}

