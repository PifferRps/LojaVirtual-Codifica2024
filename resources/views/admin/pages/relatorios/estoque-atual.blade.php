@extends('.admin._layouts.admin')
@section('conteudo')
    <section>
        <h1>Relatório Estoque Atual</h1>
        <div>
            <form action="{{ route('relatorios.estoque-atual.gerar') }}" method="post">
                @csrf
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria">
                    <option value="0">Todas</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
                <button>Baixar Relatório</button>
            </form>
        </div>
    </section>
@endsection
