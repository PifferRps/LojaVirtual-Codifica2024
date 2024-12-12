<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dados = [
            'vendasSemana' => self::calcularVendasSemana(),
            'vendasMes' => self::calcularVendasMes(),
            'vendasAno' => self::calcularVendasAno(),
            'ultimasVendas' => self::ultimasVendas(),
            'maisVendidos' => self::maisVendidos()
        ];

        $dados = (object)$dados;

        return view('admin.pages.dashboard.index', compact('dados'));
    }

    private function calcularVendasSemana()
    {
        $vendasSemana = Pedido::where('data_transacao', '<=', Carbon::now()->subDays(7)
            ->startOfDay()
            ->format('Y-m-d'))
            ->sum('valor_final');

        return $vendasSemana;
    }

    private function calcularVendasMes()
    {
        $vendasMes = Pedido::whereBetween('data_transacao', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->sum('valor_final');

        return $vendasMes;
    }

    private function calcularVendasAno()
    {
        $vendasAno = Pedido::whereBetween('data_transacao', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->sum('valor_final');

        return $vendasAno;
    }

    public function ultimasVendas()
    {
        $ultimasVendas = Pedido::orderByDesc('data_transacao')
            ->limit(3)
            ->get();

        return $ultimasVendas;
    }

    public function maisVendidos()
    {
        $maisVendidos = PedidoProduto::select('produto_id', 'produtos.nome', 'produtos.valor', DB::raw('SUM(quantidade_vendida) as vendas'))
            ->join('produtos', 'produtos.id', '=', 'pedidos_produtos.produto_id')
            ->whereNotNull('produtos.deleted_at')
            ->groupBy('produto_id')
            ->orderByDesc('vendas')
            ->limit(3)
            ->get();

        return $maisVendidos;
    }
}
