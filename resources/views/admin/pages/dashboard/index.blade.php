@extends('admin._layouts.admin')
@section('conteudo')
    <div>
        <h3>Venda por período: </h3>
        <span>Vendas semana: R$ {{ number_format($dados->vendasSemana, 2, ',', '.') }}</span><br>
        <span>Vendas mês: R$ {{ number_format($dados->vendasMes, 2, ',', '.') }}</span><br>
        <span>Vendas ano: R$ {{ number_format($dados->vendasAno, 2, ',', '.') }}</span><br><br>
        <h3>Últimas Vendas: </h3>
        @foreach($dados->ultimasVendas as $venda)
            <div>
                <span>Número do pedido: {{ $venda->id }}</span><br>
                <span>Valor: R$ {{ number_format($venda->valor_final, 2, ',', '.') }}</span><br>
                <span>Cliente: {{ $venda->cliente->nome }}</span><br>
            </div><br>
        @endforeach
        <h3>Produtos Mais Vendidos:</h3>
        @foreach($dados->maisVendidos as $produto)
            <div>
                <span>Nome do produto: {{ $produto->nome }}</span><br>
                <span>Valor: R$ {{ number_format($produto->valor, 2, ',', '.') }}</span><br>
                <span>Quantidade Vendida: {{ $produto->vendas }}</span><br>
            </div><br>
        @endforeach
    </div>
@endsection
