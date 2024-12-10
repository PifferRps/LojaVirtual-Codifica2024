<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $categorias = ProdutoCategoria::all();
        return view('site.pages.vitrine.produtos.list', compact('produtos', 'categorias'));
    }

    public static function show($id)
    {
        $produto = Produto::find($id);

        $valorComDesconto = $produto->valor-$produto->valor*(10/100);
        $valorParcelado = $produto->valor/10;
        $categorias = ProdutoCategoria::all();
        return view('site.pages.vitrine.produtos.show', compact("produto", "valorComDesconto", "valorParcelado" , "categorias"));
    }

    public static function produtosPorCategoria($id_categoria)
    {
        $produtos = Produto::where('categoria_id', $id_categoria)->get();
        $categorias = ProdutoCategoria::all();
        return view('site.pages.vitrine.porCategoria.list', compact('produtos', 'categorias'));
    }

    public function adicionarAoCarrinho($id, Request $request)
    {

        $produto = Produto::find($id);
        $sessao = session('produtos', []);

        if (array_key_exists($produto->id, $sessao)){
            $soma = $request->query('quantidade') + $sessao[$produto->id]['quantidade'];
            $sessao[$produto->id] = [
                'quantidade' => $soma,
                'produto' => $produto
            ];
        }

        if (!array_key_exists($produto->id, $sessao)) {
            $sessao[$produto->id] = [
                'quantidade' => $request->query('quantidade'),
                'produto' => $produto
            ];
        }

        session(['produtos' => $sessao]);


        return to_route('site.produto.show', $id);
    }
}
