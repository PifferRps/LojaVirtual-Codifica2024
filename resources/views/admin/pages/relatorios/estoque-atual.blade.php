@extends('.admin._layouts.admin')
@section('conteudoAdmin')
    <section class="estoque-relatorio-container" style="padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 28px; color: #333; font-weight: bold; margin-bottom: 20px;">Relatório Estoque Atual</h1>

        <div class="estoque-relatorio-form" style="display: flex; flex-direction: column; gap: 15px; max-width: 400px; margin: 0 auto;">
            <form action="{{ route('relatorios.estoque-atual.gerar') }}" method="post" style="display: flex; flex-direction: column; gap: 15px;">
                @csrf

                <div style="display: flex; flex-direction: column; gap: 5px;">
                    <label for="categoria" style="font-size: 16px; font-weight: bold; color: #333;">Categoria:</label>
                    <select name="categoria" id="categoria" style="padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ddd;">
                        <option value="0">Todas</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" style="padding: 10px 20px; font-size: 18px; font-weight: bold; background-color: #16a085; color: white; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.3s;">
                    <i class="fas fa-download" style="margin-right: 10px;"></i> Baixar Relatório
                </button>
            </form>
        </div>
    </section>
@endsection
