@extends('admin._layouts.admin')
@section('conteudoAdmin')
    <div class="dashboard-container" style="display: flex; flex-direction: column; gap: 20px; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">

        <h3 style="font-size: 24px; color: #333; font-weight: bold;">Venda por Período:</h3>

        <div class="dashboard-card" style="display: flex; gap: 10px; align-items: center; background-color: #f7f7f7; padding: 15px; border-radius: 8px;">
            <i class="fas fa-calendar-alt" style="font-size: 24px; color: #2980b9;"></i>
            <div>
                <span style="font-size: 18px; font-weight: bold;">Vendas Semana:</span>
                <span style="font-size: 18px; color: #2980b9;"> R$ {{ number_format($dados->vendasSemana, 2, ',', '.') }}</span>
            </div>
        </div>

        <div class="dashboard-card" style="display: flex; gap: 10px; align-items: center; background-color: #f7f7f7; padding: 15px; border-radius: 8px;">
            <i class="fas fa-calendar-alt" style="font-size: 24px; color: #27ae60;"></i>
            <div>
                <span style="font-size: 18px; font-weight: bold;">Vendas Mês:</span>
                <span style="font-size: 18px; color: #27ae60;"> R$ {{ number_format($dados->vendasMes, 2, ',', '.') }}</span>
            </div>
        </div>

        <div class="dashboard-card" style="display: flex; gap: 10px; align-items: center; background-color: #f7f7f7; padding: 15px; border-radius: 8px;">
            <i class="fas fa-calendar-alt" style="font-size: 24px; color: #e67e22;"></i>
            <div>
                <span style="font-size: 18px; font-weight: bold;">Vendas Ano:</span>
                <span style="font-size: 18px; color: #e67e22;"> R$ {{ number_format($dados->vendasAno, 2, ',', '.') }}</span>
            </div>
        </div>

        <h3 style="font-size: 24px; color: #333; font-weight: bold;">Últimas Vendas:</h3>
        <div class="vendas-list" style="display: flex; flex-direction: column; gap: 15px;">
            @foreach($dados->ultimasVendas as $venda)
                <div class="venda-item" style="display: flex; justify-content: space-between; align-items: center; background-color: #f7f7f7; padding: 15px; border-radius: 8px;">
                    <div>
                        <i class="fas fa-tag" style="font-size: 20px; color: #8e44ad;"></i>
                        <span style="font-size: 16px; font-weight: bold;">Pedido #{{ $venda->id }}</span>
                    </div>
                    <div>
                        <i class="fas fa-dollar-sign" style="font-size: 20px; color: #8e44ad;"></i>
                        <span style="font-size: 16px;">  R$ {{ number_format($venda->valor_final, 2, ',', '.') }}</span>
                    </div>
                    <div>
                        <i class="fas fa-user" style="font-size: 20px; color: #8e44ad;"></i>
                        <span style="font-size: 16px;">{{ $venda->cliente->nome }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <h3 style="font-size: 24px; color: #333; font-weight: bold;">Produtos Mais Vendidos:</h3>
        <div class="produtos-list" style="display: flex; flex-direction: column; gap: 15px;">
            @foreach($dados->maisVendidos as $produto)
                <div class="produto-item" style="display: flex; justify-content: space-between; align-items: center; background-color: #f7f7f7; padding: 15px; border-radius: 8px;">
                    <div>
                        <i class="fas fa-cogs" style="font-size: 20px; color: #f39c12;"></i>
                        <span style="font-size: 16px; font-weight: bold;">{{ $produto->nome }}</span>
                    </div>
                    <div>
                        <i class="fas fa-box" style="font-size: 20px; color: #f39c12;"></i>
                        <span style="font-size: 16px;">{{ $produto->vendas }} vendidos</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
