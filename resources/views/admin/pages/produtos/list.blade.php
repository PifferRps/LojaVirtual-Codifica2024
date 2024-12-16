@extends("admin._layouts.admin")
@section("conteudoAdmin")

    <section style="padding: 20px; font-family: Arial, sans-serif;">
        <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <h1 style="font-size: 24px; font-weight: bold;">{{ count($produtos) == 0 ? "Estoque vazio." : "Produtos em estoque: "}}</h1>
            <a href="{{ route('produtos.create') }}" style="text-decoration: none;">
                <button style="padding: 6px 12px; background-color: #28a745; color: white; border: none; cursor: pointer; font-size: 14px;">Adicionar Produto</button>
            </a>
        </div>

        <form method="GET" action="{{ route('produtos.index') }}" style="margin-bottom: 20px; display: flex; gap: 20px; align-items: center;">
            <label for="categoria" style="font-weight: bold;">Categoria</label>
            <select id="categoria" name="categoria" style="padding: 5px; font-size: 14px;">
                @if(isset($categorias[0]))
                    <option value="0">Todos</option>
                @endif
                @forelse ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $categoriaSelecionada ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @empty
                    <option>Adicione uma transação</option>
                @endforelse
            </select>

            <label for="ordem" style="font-weight: bold;">Ordenar por</label>
            <select id="ordem" name="ordem" style="padding: 5px; font-size: 14px;">
                <option value="0"></option>
                <option value="asc" {{ $ordem == 'asc' ? 'selected' : '' }}>menor quantidade</option>
                <option value="desc" {{ $ordem == 'desc' ? 'selected' : '' }}>maior quantidade</option>
            </select>

            <button type="submit" style="padding: 6px 12px; font-size: 14px; cursor: pointer;">Filtrar</button>
        </form>

        <div class="mensagem_flash">
            @if (session()->has('mensagem'))
                <div>{{ session('mensagem') }}</div>
            @endif
        </div>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead style="background-color: #f1f1f1;">
            <tr>
                <th style="padding: 10px; text-align: left;">Nome</th>
                <th style="padding: 10px; text-align: left;">SKU</th>
                <th style="padding: 10px; text-align: left;">Categoria</th>
                <th style="padding: 10px; text-align: left;">Valor</th>
                <th style="padding: 10px; text-align: left;">Quantidade</th>
                <th style="padding: 10px; text-align: center;">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $produto->nome }}</td>
                    <td style="padding: 10px;">{{ $produto->sku }}</td>
                    <td style="padding: 10px;">{{ $produto->categoria_id }}</td>
                    <td style="padding: 10px;">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                    <td style="padding: 10px;">{{ $produto->quantidade }}</td>
                    <td style="text-align: center;">
                        <form method="post" action="{{ route('produtos.destroy', $produto->id) }}" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" style="padding: 6px 12px; background-color: #dc3545; color: white; border: none; cursor: pointer; font-size: 14px; margin-right: 5px;">Deletar</button>
                        </form>
                        <a href="{{ route('produtos.edit', $produto->id) }}" style="text-decoration: none;">
                            <button style="padding: 6px 12px; background-color: #007bff; color: white; border: none; cursor: pointer; font-size: 14px;">Editar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
{{--@push('style')--}}
{{--    @vite('resources/css/admin.css')--}}
{{--@endpush--}}
