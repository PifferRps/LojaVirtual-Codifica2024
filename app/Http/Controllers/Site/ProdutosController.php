<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('site.pages.vitrine.produtos.list', compact('produtos'));
    }

    public static function show($id)
    {
        $produto = Produto::find($id);
        return view('site.pages.vitrine.produtos.show', compact("produto"));
    }

    public static function produtosPorCategoria($id_categoria)
    {
        $produtos = Produto::where('categoria_id', $id_categoria)->get();
        return view('site.pages.vitrine.porCategoria.list', compact('produtos'));
    }

    public function adicionarAoCarrinho($id)
    {
        $produto = Produto::find($id);
        $sessao = session('produtos');
        $sessao[$produto->id] = $produto->nome;
        session(['produtos' => $sessao]);
        dd(session());
        return to_route('site.produto.show', $id);
    }

    public function exibirProdutosCarrinho()
    {

        return view('site.pages.checkout.list');
    }
}
