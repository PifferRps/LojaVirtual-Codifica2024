@extends("admin._layouts.admin")
@section("conteudo")

    <section>
        <div>
            <h1 class="title">{{ count($produtos) == 0 ? "Estoque vazio." : "Produtos em estoque: "}}</h1>
            <a href="{{ route('produtos.create') }}" ><button class="button_adcionar" >Adicionar Produto</button></a>
        </div>
        
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
<div class="mensagem_flash">
    @if (session()->has('mensagem'))
        <div class="">
            {{ session('mensagem') }}
        </div>
    @endif
</div>
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
                    <td>{{ $produto->categoria_id }}</td>
                    <td>{{ $produto->valor }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td><form method="post" action="{{ route("produtos.destroy", $produto->id) }}">
                        @csrf
                        @method("delete")
                        <button class="button" >Deletar</button>
                    </form>
                    <a href="{{ route('produtos.edit', $produto->id) }}"><button class="button_editar" >Editar</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>

@endsection
@push('style')
    @vite('resources/css/admin.css')
@endpush
