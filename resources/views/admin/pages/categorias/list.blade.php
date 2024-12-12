@extends("admin._layouts.admin")
@vite("resources/css/categorias.css")
@section("conteudo")
    <div class="conteudo">
        <div class="conteudo_header">
            <form action="" class="form">
                <label for="Search"></label>
                <input type="text" name="searchCategories">
                <button type="submit">Buscar</button>
            </form>
            <div class="conteudo_header__button">
                <a href="{{ route('categorias.create') }}" class="">Adicionar Categoria</a>
            </div>
        </div>
        <div class="mensagem_flash">
            @if (session()->has('mensagem'))
                <div class="">
                    {{ session('mensagem') }}
                </div>
            @endif
        </div>
        <div class="conteudo_main">
            <div class="conteudo_main__infos">
                <section class="conteudo_main__infos-section1">Categoria</section>
                <section class="conteudo_main__infos-section2">Produtos vinculados</section>
                <section class="conteudo_main__infos-section3">Status</section>
            </div>
            <hr>
            @foreach($categorias as $categoria)
                <div class="conteudo_main__category">
                    <section class="conteudo_main__infos-section1">{{ $categoria->nome}}</section>
                    <section class="conteudo_main__infos-section2">50</section>
                    <section class="conteudo_main__infos-section3">Ativo</section>
                    <form method="post" action="{{ route("categorias.destroy", $categoria->id) }}">
                        @csrf
                        @method("delete")
                        <button>Deletar</button>
                    </form>
                    <section class="conteudo_main__infos-edit"><a href="{{ route('categorias.edit', $categoria->id) }}">E</a></section>
                    {{--                MUDAR PARA FORMULÁRIO--}}
                </div>
            @endforeach
        </div>
    </div>

@endsection

