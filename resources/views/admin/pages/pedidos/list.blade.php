@extends("admin._layouts.admin")
@section("conteudo")
    <div class="conteudo" >
        <div class="conteudo_header">
            <form action="" class="form">
                <label for="Search"></label>
                <input type="text" name="searchPedidos">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="conteudo_main" style="overflow: auto">
            <div class="conteudo_main__infos">
                <section class="conteudo_main__infos-section1">Número do pedido</section>
                <section class="conteudo_main__infos-section2">Valor</section>
                <section class="conteudo_main__infos-section2">Status</section>
            </div>
            <hr>
            @foreach($pedidos as $pedido)
                <div class="conteudo_main__pedido">
                    <section class="conteudo_main__infos-section1">#{{ $pedido->id }}</section>
                    <section class="conteudo_main__infos-section2">R$ {{ number_format($pedido->valor_final, 2, ',', '.') }}</section>
                    <section class="conteudo_main__infos-section2">{{ $pedido->status->status }}</section>
                    <a href="{{ route('pedidos.show', $pedido) }}"><section class="conteudo_main__infos-view">Visualizar pedido</section></a>
                </div>
            @endforeach
            @if(empty($pedidos))
                    <span>Nenhum pedido realizado.</span>
            @endif
        </div>
    </div>
@endsection
@push('style')
    @vite("resources/css/pedidos.css")
@endpush
