@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <div class="conteudo" >
        <div class="conteudo_header">
            <form action="" class="form">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="0">Todos</option>
                    @foreach($status as $status_unitario)
                        <option value="{{ $status_unitario->id }}" {{ isset($_GET['status']) && $status_unitario->id == $_GET['status'] ? 'selected' : '' }}>{{ $status_unitario->status }}</option>
                    @endforeach
                </select>

                <label for="buscarPedidos">Buscar</label>
                <input type="text" name="buscarPedidos" placeholder=" ID do pedido">

                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="mensagem_flash">
            @if (session()->has('mensagem'))
                <div class="">
                    {{ session('mensagem') }}
                </div>
            @endif
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
                    <section class="conteudo_main__infos-select">
                        <form action="{{ route('pedidos.update', $pedido) }}" method="post">
                            @method('PUT')
                            @csrf
                            <select name="status_id" id="status_id">
                                <option value="{{ $pedido->status->id }}">{{ $pedido->status->status }}</option>
                                @foreach ($status as $status_unitario)
                                    <option value="{{ $status_unitario->id }}">{{ $status_unitario->status }}</option>
                                @endforeach
                            </select>
                            <button type="submit">OK</button>
                        </form>

                    </section>
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
    @vite("resources/css/dados-clientes.css")
@endpush
