@extends("admin._layouts.admin")
@vite("resources/css/criar-categorias.css")
@section("conteudo")
<div class="conteiner-criarCategoria">
    <form action="{{ isset($categoria) ? route('categorias.update', [$categoria->id]) : route('categorias.store')}}" method="post">
        @csrf
        @isset($categoria)
            @method('PUT')
        @endisset
        <label for="nome">Categoria:</label>
        <input type="text" name="nome" value="{{ ($categoria->nome ?? '') }}">
        <button>Adicionar</button>
    </form>
    </div>
@endsection
