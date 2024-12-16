@extends("site._layouts.site")
@section("conteudo")
    <section style="
    display: flex;
    justify-content: center;
">
        <section class="container" style="max-width: 1024px">
            <h1>{{ isset($categoriaSelecionada->nome) ? $categoriaSelecionada->nome : 'Todos' }}</h1>

            <section id="produtos">
                @foreach($produtos as $produto)
                    <div class="produto-card">
                        <div class="produto-imagem">
                            <a href="{{ route('site.produto.show', $produto->id) }}">
                                <img src="{{ asset($produto->imagem_1) }}" alt="Imagem do produto">
                                <div class="produto-info">
                                    <p class="produto-nome">{{ $produto->nome }}</p>
                                    <p class="produto-valor">R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </section>
        </section>
    </section>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush

