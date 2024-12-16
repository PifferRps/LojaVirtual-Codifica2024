@extends('.admin._layouts.admin')
@section('conteudoAdmin')
    <section class="relatorios-container" style="padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 28px; color: #333; font-weight: bold; margin-bottom: 20px;">Relatórios</h1>

        <div class="relatorios-links" style="display: flex; flex-direction: column; gap: 20px;">
            <div class="relatorio-item" style="display: flex; align-items: center; padding: 15px; background-color: #f7f7f7; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <i class="fas fa-warehouse" style="font-size: 24px; color: #16a085; margin-right: 15px;"></i>
                <a href="{{ route('relatorios.estoque-atual') }}" style="font-size: 18px; font-weight: bold; text-decoration: none; color: #16a085; transition: color 0.3s;">
                    Relatório de Estoque Atual
                </a>
            </div>

            <div class="relatorio-item" style="display: flex; align-items: center; padding: 15px; background-color: #f7f7f7; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <i class="fas fa-chart-line" style="font-size: 24px; color: #2980b9; margin-right: 15px;"></i>
                <a href="{{ route('relatorios.vendas') }}" style="font-size: 18px; font-weight: bold; text-decoration: none; color: #2980b9; transition: color 0.3s;">
                    Relatório de Vendas
                </a>
            </div>
        </div>
    </section>
@endsection
