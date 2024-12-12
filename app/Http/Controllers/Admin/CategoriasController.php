<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = ProdutoCategoria::withCount('produtos')->get();

        return view('admin.pages.categorias.list', compact('categorias'));
    }

    public function create()
    {
        return view('admin.pages.categorias.form');
    }

    public function store(Request $request)
    {
        ProdutoCategoria::create($request->all());
        session()->flash('mensagem', value: 'Categoria adicionada com sucesso.');

        return redirect()->route('categorias.index');
    }

    public function edit(ProdutoCategoria $categoria)
    {
        return view('admin.pages.categorias.form', compact('categoria'));
    }

    public function update(Request $request, ProdutoCategoria $categoria)
    {
        $categoria->update($request->all());
        session()->flash('mensagem', value: 'Categoria atualizado com sucesso.');

        return redirect()->route('categorias.index');
    }

    public function destroy(ProdutoCategoria $categoria)
    {
        $categoria->delete();
        session()->flash('mensagem', value: 'Categoria excluída com sucesso.');

        return redirect()->route('categorias.index');
    }
}
