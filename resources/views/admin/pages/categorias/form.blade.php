@extends("admin._layouts.admin")
@vite("resources/css/criar-categorias.css")
@section("conteudo")
<div class="conteiner-criarCategoria">
    <form action="{{ route('categorias.store') }}" method="post">
        @csrf
        <label for="nome">Categoria:</label>
        <input type="text" name="nome">
        <button>Adicionar</button>
    </form>
    </div>
@endsection
