@extends("admin._layouts.admin")
@vite("resources/css/criarCategorias.css")
@section("conteudo")
<div class="conteiner-criarCategoria">
        <div class="nome">
            <input type="text" placeholder="Nome categoria" class="barra">
        </div>

        <div class="criar">
            <button class="botao">adicionar</button>
        </div>
    </div>
@endsection