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

    public function edit(string $id)
    {
        return view('admin.pages.categorias.form');
    }

    public function update(Request $request, ProdutoCategoria $produtoCategoria)
    {
        $produtoCategoria->update($request->all());

        return redirect()->route('admin.categorias.index');
    }

    public function destroy(ProdutoCategoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
