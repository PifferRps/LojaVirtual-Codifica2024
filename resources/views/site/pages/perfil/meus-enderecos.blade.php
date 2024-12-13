@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <div class="container_enderecos">
        <a href="{{ route('site.meu-perfil.adicionar-endereco') }}">Adicionar</a>
        @foreach($enderecos as $endereco)
            <div class="container_enderecos__form">
                <div class="container_enderecos__form-endereco">
                    <span>Rua: {{$endereco['rua']}}, Nº: {{ $endereco['numero'] }}</span>
                    <span>Bairro: {{$endereco['bairro']}} - {{ $endereco['cidade'] }} - {{ $endereco['estado'] }}</span>
                    <span>Cep: {{$endereco['cep']}}</span>
                </div>
                <section class="container_enderecos__form-botao">
                    <a href="{{ route('site.meu-perfil.editar-endereco', $endereco->id) }}">Editar</a>
                    <form method="post" action="{{ route("site.meu-perfil.deletar-endereco", $endereco) }}">
                        @csrf
                        @method("delete")
                        <button class="button">Deletar</button>
                    </form>
                    </section>
            </div>
        @endforeach
    </div>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush

