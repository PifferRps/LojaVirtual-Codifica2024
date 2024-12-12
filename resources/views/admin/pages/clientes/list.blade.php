@extends("admin._layouts.admin")
@section("conteudo")
    <div class="conteudo">
        <div class="conteudo_header">
            <form action="" class="form">
                <label for="Search"></label>
                <input type="text" name="buscarClientes">
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
        <div class="conteudo_main">
            <div class="conteudo_main__infos">
                <section class="conteudo_main__infos-section1">Cliente</section>
            </div>
            <hr>
            @foreach($clientes as $cliente)
                <div class="conteudo_main__category">
                    <section class="conteudo_main__infos-section1">{{ $cliente->nome }}</section>
                    <a href="{{ route('clientes.edit', $cliente->id) }}"><button>Editar</button></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/admin-clientes.css')
@endpush
