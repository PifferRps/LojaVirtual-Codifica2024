@extends('.admin._layouts.admin')
@section('conteudoAdmin')
    <section class="vendas-relatorio-container" style="padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 28px; color: #333; font-weight: bold; margin-bottom: 20px;">Relatório de Vendas</h1>

        <div class="vendas-relatorio-form" style="max-width: 600px; margin: 0 auto;">
            <form action="{{ route('relatorios.vendas.gerar') }}" method="post" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <label for="tipoRelatorio" style="font-size: 16px; font-weight: bold; color: #333;">Tipo de Relatório:</label>
                    <select name="tipoRelatorio" id="tipoRelatorio" class="form-control" style="padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ddd;" required>
                        <option value="">Selecione</option>
                        <option value="modelo">Pré-selecionado</option>
                        <option value="periodo">Por período</option>
                    </select>
                </div>

                <div id="container" style="display: flex; flex-direction: column; gap: 15px;"></div>

                <button type="submit" style="padding: 12px 20px; font-size: 18px; font-weight: bold; background-color: #16a085; color: white; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.3s;">
                    <i class="fas fa-download" style="margin-right: 10px;"></i> Baixar Relatório
                </button>
            </form>
        </div>
    </section>
@endsection

@push("script")
    <script>
        document.getElementById('tipoRelatorio').addEventListener('change', function() {
            const tipoRelatorio = this.value;
            const container = document.getElementById('container');

            // Remove todos os elementos existentes dentro do container
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }

            // Adiciona o bloco correspondente
            if (tipoRelatorio === 'modelo') {
                const tipoModelo = document.createElement('div');
                tipoModelo.innerHTML = `
                    <label for="periodo" style="font-size: 16px; font-weight: bold; color: #333;">Período:</label>
                    <select name="periodo" id="periodo" style="padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ddd; width: 100%">
                        <option value="todo">Todo período</option>
                        <option value="semana">Última semana</option>
                        <option value="mes">Este mês</option>
                        <option value="ano">Este ano</option>
                    </select>
                `;
                container.appendChild(tipoModelo);
            } else if (tipoRelatorio === 'periodo') {
                const tipoPeriodo = document.createElement('div');
                tipoPeriodo.innerHTML = `
                    <label for="data_inicial" style="font-size: 16px; font-weight: bold; color: #333;">Data inicial:</label>
                    <input type="date" name="data_inicial" id="data_inicial" style="padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ddd;" required>

                    <label for="data_final" style="font-size: 16px; font-weight: bold; color: #333;">Data final:</label>
                    <input type="date" name="data_final" id="data_final" style="padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ddd;" required>
                `;
                container.appendChild(tipoPeriodo);
            }
        });
    </script>
@endpush
