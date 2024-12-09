<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = ProdutoCategoria::All();

        return view('admin.pages.categorias.list', compact('categorias'));
    }

    public function create()
    {
        return view('admin.pages.categorias.form');
    }

    public function store(Request $request)
    {
        ProdutoCategoria::create($request->all());

        return redirect()->route('categorias.index');
    }

    public function edit(ProdutoCategoria $categoria)
    {
        return view('admin.pages.categorias.form', compact('categoria'));
    }

    public function update(Request $request, ProdutoCategoria $categoria)
    {
        $categoria->update($request->all());

        return redirect()->route('categorias.index');
    }

    public function destroy(ProdutoCategoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
