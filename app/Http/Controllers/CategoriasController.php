<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoCategoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = ProdutoCategoria::all();
        return view('admin.pages.categorias.list', compact('categorias'));
    }

    public function create()
    {
        return view('admin.pages.categorias.form');
    }

    public function store(Request $request)
    {
        ProdutoCategoria::create($request->all());
        return redirect()->route('admin.pages.categorias.list');
    }

    public function edit(ProdutoCategoria $categorias)
    {
        return view('admin.pages.categorias.form', compact('categorias'));
    }

    public function update(Request $request, ProdutoCategoria $categorias)
    {
        $categorias->update($request->all());
        return redirect()->route('admin.pages.categorias.list');
    }

    public function destroy(ProdutoCategoria $categorias)
    {
        $categorias->delete();
        return redirect()->route('admin.pages.categorias.list');
    }
}
