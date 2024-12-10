@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <form action="" style="display: flex; flex-direction: column" >
        <label for="senhaAntiga">Senha antiga</label>
        <input type="password"><br>
        <label for="senhaNova">Nova senha</label>
        <input type="password"><br>
        <label for="senhaNova">Confirmar nova senha</label>
        <input type="password"><br>
        <button>Salvar</button>
    </form>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
