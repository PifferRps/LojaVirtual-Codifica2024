@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <form action="" class="informacoes dadosClientesPrincipal">
        <label for="senhaAntiga">Senha Antiga</label>
        <input type="password"><br>
        <label for="senhaNova">Nova Senha</label>
        <input type="password"><br>
        <label for="senhaNova">Confirmar Nova Senha</label>
        <input type="password"><br>
        <button class=salvar>Salvar</button>
    </form>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
