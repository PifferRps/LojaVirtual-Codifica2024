@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <div class="dadosClientesPrincipal">
        <div class=informacoes>
          <form action="{{ route('site.meu-perfil.update', $usuario) }}" method="post">
              @method('PUT')
              @csrf
              <label for="nome">Nome</label>
              <input type="text" name="nome"  value="{{ $usuario->cliente->nome }}"><br><br>
              <label for="email">Email</label>
              <input type="text" name="email"  value="{{ $usuario->email }}"><br><br>
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone"  value="{{ $usuario->cliente->telefone }}"><br><br>
              <label for="nascimento">Nascimento</label>
              <input type="date" name="data_nascimento"  value="{{ $usuario->cliente->data_nascimento }}"><br><br>
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" disabled value="{{ $usuario->cliente->cpf }}"><br><br>
              <button>Salvar</button>
          </form>
        </div>
    </div>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
