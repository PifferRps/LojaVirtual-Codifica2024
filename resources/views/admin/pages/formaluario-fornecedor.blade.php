@extends("admin._layouts.admin")
@vite("resources/css/formulario-produtos.css")
@section("conteudo")
    <div>
        <div class="nav">
            <a href="#">Categorias</a>
            <p>></p>
            <a href="#">Adicionar categorias</a>
        </div>

        <form action="#" enctype="multipart/form-data" class="formulario-fornecedor">
            <label for="name">Nome do fornecedor:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="logo">Logo:</label><br>
            <input type="file" name="arquivos" multiple /><br>

            <button type="submit" class="registerbtn">Register</button>
        </form>
    </div>
@endsection
