<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('site.pages.vitrine.produtos.list', compact('produtos'));
    }

    public static function show($id_categoria)
    {
        return view('site.pages.vitrine.produtos.show');
    }

    public static function produtosPorCategoria($id_categoria)
    {
        return view('site.pages.vitrine.porCategoria.list');
    }
}
