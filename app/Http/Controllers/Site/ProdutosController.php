<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\PedidoProduto;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function index(Request $request)
    {
        $novidades = Produto::orderByDesc('id')
            ->limit(5)
            ->get();

        $mais_vendidos = PedidoProduto::select('produto_id', DB::raw('SUM(quantidade_vendida) as vendas'))
            ->groupBy('produto_id')
            ->orderByDesc('vendas')
            ->limit(5)
            ->get();

        $categorias = ProdutoCategoria::all();

        return view('site.pages.vitrine.produtos.list', compact('novidades', 'mais_vendidos', 'categorias'));
    }

    public static function show(Produto $produto)
    {
        $categorias = ProdutoCategoria::all();

        return view('site.pages.vitrine.produtos.show', compact("produto", "categorias"));
    }

    public static function produtosPorCategoria($id_categoria)
    {
        $produtos = Produto::where('categoria_id', $id_categoria)->get();
        $categorias = ProdutoCategoria::all();
        return view('site.pages.vitrine.porCategoria.list', compact('produtos', 'categorias'));
    }

    public function pesquisaProdutos(Request $request)
    {
        $query = Produto::query();

        if($request->pesquisaProdutos){
            $query->where('nome', 'like', "%{$request->pesquisaProdutos}%");
        }

        $pesquisaProdutos = $query->get();
        $categorias = ProdutoCategoria::all();

        return view('site.pages.vitrine.produtos.pesquisa', compact(  'categorias', 'pesquisaProdutos'));
    }

    public function adicionarAoCarrinho($id, Request $request)
    {
        $produto = Produto::find($id);

        $sessao = session('produtos', []);

        if (array_key_exists($produto->id, $sessao)) {
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
        session()->flash('mensagem', value: 'Produto adicionado ao carrinho.');

        return to_route('site.produto.show', $id);
    }
}
