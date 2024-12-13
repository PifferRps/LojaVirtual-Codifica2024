<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoStatus;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public function index()
    {
        return view('admin.pages.relatorios.index');
    }

    public function paginaEstoqueAtual()
    {
        $produtos = Produto::all();
        $categorias = ProdutoCategoria::all();

        return view('admin.pages.relatorios.estoque-atual', compact('produtos', 'categorias'));
    }

    public function gerarPdfEstoqueAtual(Request $request)
    {
        $categoriaEscolhida = $request->input('categoria');
        $nomeCategoria = ProdutoCategoria::find($categoriaEscolhida);

        $query = Produto::query();

        if($categoriaEscolhida && $categoriaEscolhida != 0){
            $query->where('categoria_id', $categoriaEscolhida);
        }

        $produtos = $query->get();

        $dompdf = new Dompdf();

        $html = view('admin.pages.relatorios.modelos.estoque-atual', compact('produtos', 'nomeCategoria'));

        $dompdf->loadHtml($html);
        $dompdf->render();

        return $dompdf->stream('relatorio_estoque.pdf');
    }

    public function paginaVendas(Request $request)
    {
        return view('admin.pages.relatorios.vendas');
    }

    public function gerarPdfVendas(Request $request)
    {
        $tipoRelatorio = $request->input('tipoRelatorio');

        if($tipoRelatorio == 'modelo' &&  $request->input('periodo') == 'todo') {
            $vendas = Pedido::all();
        }

        if($tipoRelatorio == 'modelo' &&  $request->input('periodo') == 'semana') {
            $vendas = Pedido::where('data_transacao', '<=', Carbon::now()->subDays(7)
                ->startOfDay()
                ->format('Y-m-d')
            )->get();
        }

        if($tipoRelatorio == 'modelo' &&  $request->input('periodo') == 'mes') {
            $vendas = Pedido::whereBetween('data_transacao', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->get();
        }

        if($tipoRelatorio == 'modelo' &&  $request->input('periodo') == 'ano') {
            $vendas = Pedido::whereBetween('data_transacao', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear()
            ])->get();
        }

        if($tipoRelatorio == 'periodo') {
            $dataInicial = $request->input('data_inicial');
            $dataFinal = $request->input('data_final');

            $vendas = Pedido::whereBetween('data_transacao', [
                $dataInicial,
                $dataFinal
            ])->get();
        }

        $dompdf = new Dompdf();

        $html = view('admin.pages.relatorios.modelos.vendas', compact('vendas'));

        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream();

        return $dompdf->stream('relatorio_vendas.pdf');
    }

    public function paginaBaixoEstoque()
    {
        return view('admin.pages.relatorios.baixo-estoque');
    }

    public function gerarPdfBaixoEstoque(Request $request)
    {

        $dompdf = new Dompdf();

        $html = view('admin.pages.relatorios.modelos.baixo-estoque', compact('baixoEstoque'));

        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream();

        return $dompdf->stream('relatorio_vendas.pdf');
    }
}
