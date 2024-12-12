<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\PedidoProduto;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class ProdutosController extends Controller
{
    public function index()
    {
        $novidades = Produto::orderByDesc('id')
            ->where('quantidade', '>', 0)
            ->limit(5)
            ->get();

        $mais_vendidos = PedidoProduto::select('produto_id', DB::raw('SUM(quantidade_vendida) as vendas'))
            ->join('produtos', 'produtos.id', '=', 'pedidos_produtos.produto_id') // Faz a junção com a tabela de produtos
            ->where('produtos.quantidade', '>', 0) // Filtra os produtos com quantidade > 0
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

    public function adicionarAoCarrinho($id, Request $request)
    {
        $produto = Produto::find($id);

        if ($produto->quantidade < $request->query('quantidade')){
            session()->flash('mensagem', "Quantidade indisponível. Estoque disponível: {$produto->quantidade}");

            return redirect()->back();
        }

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
