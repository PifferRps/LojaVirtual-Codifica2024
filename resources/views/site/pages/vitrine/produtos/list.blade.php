@extends("site._layouts.site")
@section("conteudo")
    <section class="container">
        <div class="container_produtos">
            <div class="container_produtos__destaque">
                <h1 class="container_produtos__destaque-tittle">Mais Vendidos</h1>
                <div class="container_produtos__destaque-imgs">
                    @foreach($produtos as $produto)
                    <div
                        style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                        <a href="{{ route('site.produto.show', $produto->id) }}">
                            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
                            <p>{{ $produto->nome }}</p>
                            <p>{{ $produto->valor }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container_produtos__destaque">
            <h1 class="container_produtos__destaque-tittle">Novidades</h1>
            <div class="container_produtos__destaque-imgs">
                @foreach($produtos as $produto)
                    <div
                        style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                        <a href="{{ route('site.produto.show', $produto->id) }}">
                            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
                            <p>{{ $produto->nome }}</p>
                            <p>{{ $produto->valor }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="container_produtos__destaque-imgs">
                @foreach($produtos as $produto)
                    <div
                        style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                        <a href="{{ route('site.produto.show', $produto->id) }}">
                            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
                            <p>{{ $produto->nome }}</p>
                            <p>{{ $produto->valor }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush

