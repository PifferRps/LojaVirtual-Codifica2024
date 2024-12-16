@extends("admin._layouts.admin")
@vite("resources/css/categorias.css")
@section("conteudo")
    <div class="conteudo">
        <div class="header_container__search conteudo_header">
            <form action="">
                <label for="Search"></label>
                <input type="text" name="searchCategories">
                <button type="submit">Buscar</button>
            </form>
            <div class="conteudo_header__button">
                <a href="{{ route('categorias.create') }}" class="button_editar" style="color: black;">Adicionar Categoria</a>
            </div>
        </div>
        <div style="width:90%">
            @if (session()->has('mensagem'))
                <div>
                    {{ session('mensagem') }}
                </div>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Produtos Vinculados</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
            <tr class="table__item">
                    <td>{{ $categoria->nome}}</td>
                    <td>{{ $categoria->produtos_count }}</td>
                    <td>
                        <section class="item__button">
                            <form method="post" action="{{ route("categorias.destroy", $categoria->id) }}">
                                @csrf
                                @method("delete")
                                <button class="button">Deletar</button>
                            </form>
                            <a href="{{ route('categorias.edit', $categoria->id) }}">
                                <button class="button_editar">Editar</button>
                            </a>    
                        </section>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
