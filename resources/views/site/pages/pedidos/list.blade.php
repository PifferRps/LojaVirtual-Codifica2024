@extends('site._layouts.site')
@section('conteudo')
    @vite('resources/css/meus-pedidos.css')

    <h1 class="titulo">Meus Pedidos</h1>

    <div id="filtragem">
        <form method="GET" action="{{ route('pedidos.index') }}">
            <div id="filtragem_divisao">
                <div class="input-box">
                <i class="uil uil-search"></i>
                <input type="text" name="search" placeholder="Código pedido" value="{{ request('search') }}" />
                <button type="submit" class="button">Procurar</button>
                </div>
            </div>
        </form>
    </div>

    <div id="pedidos_listagem">
        @if($pedidos->isEmpty())
            <p>Não há pedidos disponíveis no momento.</p>
        @else
            <ul id="items">
                @foreach($pedidos as $pedido)
                    <li>
                        <div class="pedido-card">
                            <h3>Pedido #{{ $pedido->id }}</h3>
                            <p><strong>Produtos:</strong> {{ $pedido->produto }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($pedido->status_id) }}</p>
                            <p><strong>Valor Total:</strong> R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</p>
                            <p><strong>Desconto:</strong> {{ ucfirst($pedido->desconto_total) }}</p>
                            <p><strong>Total a Pagar:</strong> R$ {{ number_format($pedido->valor_final, 2, ',', '.') }}</p>
                            <button class="consulta_pedidos">Ver Pedido</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection