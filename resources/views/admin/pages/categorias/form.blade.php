@extends("admin._layouts.admin")
@vite("resources/css/criar-categorias.css")
@section("conteudoAdmin")
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 500px; margin: 30px auto; padding: 30px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Editar Categoria</h2>
        <form action="{{ isset($categoria) ? route('categorias.update', [$categoria->id]) : route('categorias.store')}}" method="post" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            @isset($categoria)
                @method('PUT')
            @endisset
            <label for="nome" style="font-size: 18px; color: #555; margin-bottom: 8px;">Nome da Categoria</label>
            <input type="text" name="nome" value="{{ ($categoria->nome ?? '') }}" placeholder="Digite o nome da categoria"
                   style="padding: 12px 16px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; transition: all 0.3s ease;" required>
            <button type="submit"
                    style="background-color: #007BFF; color: white; padding: 12px 20px; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
                Salvar Categoria
            </button>
        </form>
    </div>
@endsection

