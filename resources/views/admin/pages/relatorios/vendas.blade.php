@extends('.admin._layouts.admin')
@section('conteudo')
    <section>
        <h1>Relatório Estoque Atual</h1>
        <div>
            <form action="{{ route('relatorios.vendas.gerar') }}" method="post">
                @csrf

                <div>
                    <label>Tipo de Relatório:</label>
                    <select name="tipoRelatorio" id="tipoRelatorio" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="modelo">Pré-selecionado</option>
                        <option value="periodo">Por período</option>
                    </select>
                </div>

                <div id="container"></div>

                <button>Baixar Relatório</button>
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
                    <label for="periodo">Período:</label>
                    <select name="periodo" id="periodo">
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
                    <label for="data_inicial">Data inicial:</label>
                    <input type="date" name="data_inicial" id="data_inicial" required>
                    <label for="data_final">Data final:</label>
                    <input type="date" name="data_final" id="data_final" required>
                `;
                container.appendChild(tipoPeriodo);
            }
        });
    </script>
@endpush
