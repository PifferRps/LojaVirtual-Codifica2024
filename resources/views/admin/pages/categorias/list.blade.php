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
        <div class="conteudo_main">
            <div class="conteudo_main__infos">
                <section class="conteudo_main__infos-section1">Categoria</section>
                <section class="conteudo_main__infos-section2">Produtos vinculados</section>
                <section class="conteudo_main__infos-section3">Status</section>
            </div>
            <hr>
            <div class="conteudo_main__category">
                <section class="conteudo_main__infos-section1">Eletrônico</section>
                <section class="conteudo_main__infos-section2">50</section>
                <section class="conteudo_main__infos-section3">Ativo</section>
                <section class="conteudo_main__infos-edit"><a href="{{ route('categorias.edit', 'TESTE') }}">E</a></section>
{{--                MUDAR PARA FORMULÁRIO--}}
                <section class="conteudo_main__infos-view"><a href="{{ route('categorias.destroy', 'TESTE') }}">X</a></section>
            </div>
        </div>
    </div>
@endsection
