<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
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
