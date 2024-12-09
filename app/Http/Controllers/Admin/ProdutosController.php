<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
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
        $categorias = ProdutoCategoria::all();

        return view('admin.pages.produtos.form', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('img', 'public');
        }
    
        Produto::create([
            'categoria_id' => $request->input('categoria_id'),
            'sku' => $request->input('sku'),
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'quantidade' => $request->input('quantidade'),
            'imagem_1' => $caminhoImagem ?? null,
            'descricao' => $request->input('descricao'),
        ]);
    
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
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
