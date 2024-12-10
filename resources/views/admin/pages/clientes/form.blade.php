@extends('.admin._layouts.admin')
@section('conteudo')
    <form action="{{ route('clientes.update', $cliente->id) }}" method="post">
        @isset($cliente)
            @method('PUT')
        @endisset
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome"  value="{{ $cliente->nome }}"><br><br>
        <label for="email">Email</label>
        <input type="text" name="email"  value="{{ $usuario[$cliente->id]->email}}"><br><br>
        <label for="senha">Senha</label>
        <input type="password" name="senha"><br><br>
        <label for="documento">CPF</label>
        <input type="text" name="documento" value="{{ $cliente->documento }}"><br><br>
        <button>Salvar</button>
    </form>
    @endsection
