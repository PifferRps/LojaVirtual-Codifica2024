@extends("admin._layouts.admin")

@section("conteudo")
    <div>
        <h1>{{ count($produtos) == 0 ? "Estoque vazio." : "Produtos em estoque: "}}</h1><br><br>
        <a href="{{ route('produtos.create') }}"><button>Adicionar Produto</button></a><br><br>
        <hr>
        <br><br>
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
                    <td><form style="margin-right: 20px" method="post" action="{{ route("produtos.destroy", $produto->id) }}">
                        @csrf
                        @method("delete")
                        <button style="background-color: red">Deletar</button>
                    </form>
                    <a href="{{ route('produtos.edit', $produto->id) }}"><button>Editar</button></a></td>
                </tr>

{{--                                <div style="display: flex; justify-content: space-between">--}}
{{--                                    <section style="margin: 1px 30px 1px 1px">--}}
{{--                                        <h1>Nome:</h1><p>{{ $produto->nome}}</p>--}}
{{--                                        <p><b>SKU: </b>{{ $produto->sku}}</p>--}}
{{--                                        <p><b>Categoria: </b>{{ $produto->categoria_id}}</p>--}}
{{--                                    </section style="margin: 1px 30px 1px 1px">--}}
{{--                                    <section>--}}
{{--                                        <p><b>Valor: </b>R${{ number_format($produto->valor, 2, ".", ",")}}</p>--}}
{{--                                    </section style="margin: 1px 30px 1px 1px">--}}
{{--                                    <section style="margin: 1px 30px 1px 1px">--}}
{{--                                        <p><b>Quantidade: </b>{{ $produto->quantidade}}</p>--}}
{{--                                    </section>--}}
{{--                                    <div style="display: flex">--}}
{{--                                        <form style="margin-right: 20px" method="post" action="{{ route("produtos.destroy", $produto->id) }}">--}}
{{--                                            @csrf--}}
{{--                                            @method("delete")--}}
{{--                                            <button style="background-color: red">Deletar</button>--}}
{{--                                        </form>--}}
{{--                                        <a href="{{ route('produtos.edit', $produto->id) }}"><button>Editar</button></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
