@extends('.admin._layouts.admin')
@section('conteudo')
    <section>
        <h1>Relatórios</h1>
        <div>
            <div style="display: flex; flex-direction: column">
                <a href="{{ route('relatorios.estoque-atual') }}" target="_blank">Estoque atual</a>
                <a href="{{ route('relatorios.vendas') }}" target="_blank">Vendas</a>
            </div>
        </div>
    </section>
@endsection
