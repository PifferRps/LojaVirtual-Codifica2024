@extends("admin._layouts.admin")

@section("conteudo")
    <section>
        <div>
            <h1 class="title">{{ count($produtos) == 0 ? "Estoque vazio." : "Produtos em estoque: "}}</h1>
            <a href="{{ route('produtos.create') }}" ><button class="button_adcionar" >Adicionar Produto</button></a>
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
