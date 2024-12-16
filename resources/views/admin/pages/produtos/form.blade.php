@extends("admin._layouts.admin")
@vite('resources/css/formulario-produtos.css')
@section("conteudoAdmin")
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <form action="{{ isset($produto) ? route('produtos.update', [$produto->id]) : route('produtos.store')}}" method="post" enctype="multipart/form-data" class="form">
            @csrf
            @isset($produto)
                @method('PUT')
            @endisset
            <div class="form_row" style="margin-bottom: 20px;">
                <label for="nome" class="form_row__label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Nome</label>
                <input type="text" name="nome" id="nome" class="form_row__input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" value="{{ ($produto->nome ?? '') }}">
            </div>

            <div class="form_row" style="margin-bottom: 20px;">
                <label for="descricao" class="form_row__label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Descrição</label>
                <textarea name="descricao" id="descricao" rows="5" cols="50" class="form_row__input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>{{ ($produto->descricao ?? '') }}</textarea>
            </div>

            <div class="form_section" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <div class="form_section__column" style="flex: 1; padding-right: 10px;">
                    <label for="sku" class="form_section__column-label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">SKU</label>
                    <input type="text" name="sku" id="sku" class="form_section__column-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" value="{{ ($produto->sku ?? '') }}">
                </div>

                <div class="form_section__column" style="flex: 1; padding-right: 10px;">
                    <label for="categoria_id" class="form_section__column-label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Categoria</label>
                    <select name="categoria_id" id="categoria_id" class="form_section__column-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_section__column" style="flex: 1;">
                    <label for="valor" class="form_section__column-label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Valor</label>
                    <input type="number" name="valor" id="valor" class="form_section__column-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" step=".02" value="{{ ($produto->valor ?? '') }}">
                </div>
            </div>

            <div class="form_section__column" style="margin-bottom: 20px;">
                <label for="quantidade" class="form_section__column-label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form_section__column-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" value="{{ ($produto->quantidade ?? '') }}">
            </div>

            <div class="form_row" style="margin-bottom: 20px;">
                <label for="imagem" class="form_row__label" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Adicionar imagem</label>
                <input type="file" name="imagem" id="imagem" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div class="form_action" style="margin-top: 20px;">
                <button type="submit" value="salvar" name="salvar" class="form_action__save" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px;">Salvar</button>
            </div>
        </form>
    </div>
@endsection

