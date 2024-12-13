@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <form action="{{ route('site.meu-perfil.salvar-senha') }}" method="post" style="display: flex; flex-direction: column" >
        @csrf
        <label for="senha_atual">Senha antiga</label>
        <input name="senha_atual" type="password"><br>
        <label for="nova_senha">Nova senha</label>
        <input name="nova_senha" type="password"><br>
        <label for="nova_senha">Confirmar nova senha</label>
        <input name="nova_senha_confirmation" type="password"><br>
        <button>Salvar</button>
        <p>{{session('erro')}}</p>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </form>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
