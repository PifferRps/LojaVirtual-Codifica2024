@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <div class="dadosClientesPrincipal">
        <div class=informacoes>
            <label for="nome">Nome</label>
            <input type="text" name="nome"  value="Guilherme Costa"><br><br>
            <label for="email">Email</label>
            <input type="text" name="email"  value="guilherme@email.com"><br><br>
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone"  value="(27) 99999-9999"><br><br>
            <label for="nascimento">Nascimento</label>
            <input type="date" name="nascimento"  value="05/08/2001"><br><br>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" disabled value="111.222.333-44"><br><br>
            <a href="{{ route('site.meu-perfil.update') }}"><button class=salvar>Salvar</button></a>
        </div>
    </div>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
