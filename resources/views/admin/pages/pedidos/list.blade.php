@extends("admin._layouts.admin")
@vite("resources/css/pedidos.css")
@section("conteudo")
    <div class="conteudo">
        <div class="conteudo_header">
            <form action="" class="form">
                <label for="Search"></label>
                <input type="text" name="searchPedidos">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="conteudo_main">
            <div class="conteudo_main__infos">
                <section class="conteudo_main__infos-section1">Número do pedido</section>
                <section class="conteudo_main__infos-section2">Status</section>
            </div>
            <hr>
            <div class="conteudo_main__pedido">
                <section class="conteudo_main__infos-section1">#45587</section>
                <section class="conteudo_main__infos-section2">Em separação</section>
                <a href=""><section class="conteudo_main__infos-view">Visualizar pedido</section></a>
            </div>
        </div>
    </div>
@endsection
