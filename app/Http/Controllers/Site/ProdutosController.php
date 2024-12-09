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

        $valorComDesconto = $produto->valor-$produto->valor*(10/100);
        $valorParcelado = $produto->valor/10;

        return view('site.pages.vitrine.produtos.show', compact("produto", "valorComDesconto", "valorParcelado"));
    }

    public static function produtosPorCategoria($id_categoria)
    {
        $produtos = Produto::where('categoria_id', $id_categoria)->get();
        return view('site.pages.vitrine.porCategoria.list', compact('produtos'));
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


    public function exibirProdutosCarrinho()
    {

        return view('site.pages.checkout.list');
    }

    public function calcularDescontoPix($id)
    {


        return to_route('site.produto.show', $id, compact('valorComDesconto'));


    }
}
