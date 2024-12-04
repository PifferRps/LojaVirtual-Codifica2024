@extends("site._layouts.site")
@section("conteudo")
    <section class="container" style="max-width: 1024px">
        <h1>Categoria</h1>

        <section id="produtos" style="
            display: grid;
            grid-template-columns: auto auto auto auto;
            justify-content: space-around;
            column-gap: 80px;
            margin-top: 15px"
        >

            @foreach($produtos as $produto)
            <section class="produto" style="margin-top: 15px; display: flex; flex-direction: column; justify-content: center">
                <a href="{{ route('site.produto.show', $produto->id) }}">
                    <img src="{{ asset('img/1.jpg') }}" width="200" height="200">
                    <p>Produto A</p>
                    <p>R$49,90</p>
                </a>
            </section>
            @endforeach
        </section>
    </section>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush

