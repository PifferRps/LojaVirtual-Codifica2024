@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <form action="" style="display: flex; flex-direction: column" class="header_container__search dadosClientesPrincipal">
        <label for="senhaAntiga">Senha Antiga</label>
        <input type="password"><br>
        <label for="senhaNova">Nova Senha</label>
        <input type="password"><br>
        <label for="senhaNova">Confirmar Nova Senha</label>
        <input type="password"><br>
        <button>Salvar</button>
    </form>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
