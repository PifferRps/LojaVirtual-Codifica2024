@extends("admin._layouts.admin")
@section("conteudo")
    <div class="conteudo">
        <div class="conteudo_header">
            <form action="" class="form">
                <label for="Search"></label>
                <input type="text" name="buscarClientes">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="conteudo_main">
            <div class="conteudo_main__infos">
                <section class="conteudo_main__infos-section1">Cliente</section>
                <section class="conteudo_main__infos-section3">Status</section>
            </div>
            <hr>
            <div class="conteudo_main__category">
                <section class="conteudo_main__infos-section1">João da Silva</section>
                <section class="conteudo_main__infos-section3">Ativo</section>
                <section class="conteudo_main__infos-edit">E</section>
                <section class="conteudo_main__infos-delete">X</section>
            </div>
        </div>
    </div>
@endsection
