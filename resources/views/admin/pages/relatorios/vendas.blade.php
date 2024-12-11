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

                <div id="tipo-modelo" style="display: none;">
                    <label for="periodo">Período:</label>
                    <select name="periodo" id="periodo">
                        <option value="todo">Todo período</option>
                        <option value="semana">Última semana</option>
                        <option value="mes">Este mês</option>
                        <option value="ano">Este ano</option>
                    </select>
                </div>

                <div id="tipo-periodo" style="display: none;">
                    <label for="data_inicial">Data inicial:</label>
                    <input type="date" name="data_inicial" id="data_inicial" required>
                    <label for="data_final">Data final:</label>
                    <input type="date" name="data_final" id="data_final" required>
                </div>

                <button>Baixar Relatório</button>
            </form>
        </div>
    </section>

@endsection

@push("script")
    <script>
        document.getElementById('tipoRelatorio').addEventListener('change', function() {
            const tipoRelatorio = this.value;
            document.getElementById('tipo-modelo').style.display = tipoRelatorio === 'modelo' ? 'block' : 'none';
            document.getElementById('tipo-periodo').style.display = tipoRelatorio === 'periodo' ? 'block' : 'none';
        });
    </script>
@endpush
