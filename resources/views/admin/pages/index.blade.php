@extends("admin._layouts.admin")

@section("conteudo")
<div>
    <a href="{{ route('produtos.create') }}">Criar</a>
    @foreach($produtos as $produto)
        <div>
            {{ $produto->nome}}
            <form method="post" action="{{ route("produtos.destroy", $produto->id) }}">
                @csrf
                @method("delete")
                <button>X</button>
            </form>
        </div>
        <br>
    @endforeach
</div>
@endsection
