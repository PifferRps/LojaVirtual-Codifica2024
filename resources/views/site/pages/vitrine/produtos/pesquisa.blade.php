@extends("site._layouts.site", ['categorias' => $categorias])
@section("conteudo")
<body class="container">
    <div class="container_produtos__destaque">
        <h1 class="container_produtos__destaque-title">Resultado</h1>
        <div class="container_produtos__grid">
            @foreach($pesquisaProdutos as $produto)
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
</body>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush
