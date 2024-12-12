@extends("site._layouts.site")
@section("conteudo")
    <section class="container" style="max-width: 1024px">
        <h1>Categoria</h1>

        <section id="produtos">

            @foreach($produtos as $produto)
            <div class="produto-card">
                <a href="{{ route('site.produto.show', $produto->id) }}">
                    <img src="{{  asset($produto->imagem_1)  }}" alt="Imagem do produto">
                    <p class="produto-nome">{{ $produto->nome }}</p>
                    <p class="produto-valor">R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                </a>
            </div>
            @endforeach
        </section>
    </section>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush

