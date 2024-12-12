<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(Request $request)
    {
        $ordem = $request->query('ordem');
        $categoriaSelecionada = $request->query('categoria');

        $query = Produto::query();

        if ($categoriaSelecionada && $categoriaSelecionada != 0) {
            $query->where('categoria_id', $categoriaSelecionada);
        }

        if ($ordem) {
            $query->orderBy('quantidade', $ordem);
        }

        $produtos = $query->get();
        $categorias = ProdutoCategoria::all();

        return view('admin.pages.produtos.list', compact('produtos', 'categorias', 'categoriaSelecionada', 'ordem'));
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
            'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $caminhoImagem = '/img/codificamaislogo.png';


        if ($request->hasFile('imagem')) {
            $caminhoImagem = 'storage/' . $request->file('imagem')->store('uploads', 'public');
        }

        Produto::create([
            'categoria_id' => $request->input('categoria_id'),
            'sku' => $request->input('sku'),
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'quantidade' => $request->input('quantidade'),
            'imagem_1' => $caminhoImagem,
            'descricao' => $request->input('descricao'),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        session()->flash('mensagem', value: 'Produto excluído com sucesso.');

        return redirect()->route('produtos.index');
    }

    public function edit(Produto $produto)
    {
        $categorias = ProdutoCategoria::all();

        return view('admin.pages.produtos.form', compact('produto', 'categorias'));

    }

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        session()->flash('mensagem', value: 'Produto atualizado com sucesso.');

        return redirect()->route('produtos.index');
    }
}
