@extends("site._layouts.site", ['categorias' => $categorias])
@section("conteudo")
<body class="container">

    <div class="container_produtos__destaque">
        <h1 class="container_produtos__destaque-title">Mais Vendidos</h1>
        <div class="container_produtos__grid">
            @foreach($novidades as $produto)
            <div class="produto-card">
                <a href="{{ route('site.produto.show', $produto) }}">
                    <img src="{{ asset($produto->imagem_1) }}" alt="{{ $produto->nome }}">
                    <p class="produto-nome">{{ $produto->nome }}</p>
                    <p class="produto-valor">R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container_produtos__destaque">
        <h1 class="container_produtos__destaque-title">Novidades</h1>
        <div class="container_produtos__grid">
            @foreach($mais_vendidos as $item)
            <div class="produto-card">
                <a href="{{ route('site.produto.show', $item->produto) }}">
                    <img src="{{ asset($item->produto->imagem_1) }}" alt="{{ $item->produto->nome }}">
                    <p class="produto-nome">{{ $item->produto->nome }}</p>
                    <p class="produto-valor">R$ {{ number_format($item->produto->valor, 2, ',', '.') }}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush
