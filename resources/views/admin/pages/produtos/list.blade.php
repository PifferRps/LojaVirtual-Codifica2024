@extends("admin._layouts.admin")
@section("conteudo")
<div>

<h1>{{ count($produtos) == 0 ? "Estoque vazio." : "Produtos em estoque: "}}</h1>
<a href="{{ route('produtos.create') }}"><button>Adicionar Produto</button></a>

<form method="GET" action="{{ route('produtos.index') }}">
    <label for="categoria">Categoria</label>
    <select id="categoria" name="categoria">
        @if(isset($categorias[0]))
            <option value="0">Todos</option>
        @endif
        @forelse ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ $categoria->id == $categoriaSelecionada ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @empty
            <option>Adicione uma transação</option>
        @endforelse
    </select>

    <label for="ordem">Ordenar por</label>
    <select id="ordem" name="ordem">
        <option value="0"></option>
        <option value="asc" {{ $ordem == 'asc' ? 'selected' : '' }}>menor quantidade</option>
        <option value="desc" {{ $ordem == 'desc' ? 'selected' : '' }}>maior quantidade</option>
    </select>

    <button type="submit">Filtrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>SKU</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->sku }}</td>
            <td>{{ $produto->categoria->nome }}</td>
            <td>{{ $produto->valor }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td><form style="margin-right: 20px" method="post" action="{{ route("produtos.destroy", $produto->id) }}">
                @csrf
                @method("delete")
                <button style="background-color: red">Deletar</button>
            </form>
            <a href="{{ route('produtos.edit', $produto->id) }}"><button>Editar</button></a></td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection
