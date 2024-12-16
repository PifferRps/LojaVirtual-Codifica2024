@extends("admin._layouts.admin")
@vite("resources/css/categorias.css")
@section("conteudoAdmin")
    <div style="font-family: Arial, sans-serif; max-width: 100%; margin: 0; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <form action="" style="flex: 1; max-width: 400px; display: flex; justify-content: space-between;">
                <input type="text" name="searchCategories" placeholder="Buscar categorias" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
                <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer; font-size: 16px;">Buscar</button>
            </form>
            <div>
                <a href="{{ route('categorias.create') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 16px; display: inline-block;">Adicionar Categoria</a>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            @if (session()->has('mensagem'))
                <div style="background-color: #dff0d8; color: #3c763d; padding: 10px; border-radius: 5px;">
                    {{ session('mensagem') }}
                </div>
            @endif
        </div>

        <div>
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; padding: 10px 0; font-weight: bold; color: #333;">
                <section style="font-size: 16px;">Categoria</section>
                <section style="font-size: 16px; text-align: left">Produtos vinculados</section>
                <section style="font-size: 16px; text-align: center">Ações</section>
            </div>
            <hr style="margin: 10px 0;">
            @foreach($categorias as $categoria)
                <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; align-items: center; padding: 10px 0; border-bottom: 1px solid #ccc;">
                    <section style="font-size: 16px; color: #555;">{{ $categoria->nome }}</section>
                    <section style="font-size: 16px; color: #555;">{{ $categoria->produtos_count }}</section>
                    <div style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <form method="post" action="{{ route("categorias.destroy", $categoria->id) }}" style="display: inline;">
                            @csrf
                            @method("delete")
                            <button type="submit" style="background-color: #f44336; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer; font-size: 14px;">Deletar</button>
                        </form>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" style="background-color: #007bff; color: white; padding: 5px 16px; text-decoration: none; border-radius: 5px; font-size: 14px; display: inline-block;">Editar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



