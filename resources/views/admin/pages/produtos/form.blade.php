@extends("admin._layouts.admin")
@vite('resources/css/formulario-produtos.css')
@section("conteudo")
    <div class="container">
        <form action="{{ isset($produto) ? route('produtos.update', [$produto->id]) : route('produtos.store')}}" method="post" enctype="multipart/form-data" class="form">
            @csrf
            @isset($produto)
                @method('PUT')
            @endisset
            <div class="form_row">
                <label for="nome" class="form_row__label">Nome</label>
                <input type="text" name="nome" id="nome" class="form_row__input" value="{{ ($produto->nome ?? '') }}">
            </div>


            <div class="form_row">
                <label for="descricao" class="form_row__label">Descrição</label>
                <textarea name="descricao" id="descricao" rows="5" cols="50" class="form_row__input" required>{{ ($produto->descricao ?? '') }}</textarea>
            </div>


            <div class="form_section">
                <div class="form_section__column">
                    <label for="nome" class="form_section__column-label">SKU</label>
                    <input type="text" name="sku" id="sku" class="form_section__column-input" value="{{ ($produto->sku ?? '') }}">
                </div>

                <div class="form_section__column">
                    <label for="categoria_id" class="form_section__column-label">Categoria</label>
                    <select name="categoria_id" id="categoria_id" class="form_section__column-input">
                        <option {{ isset($produto) && $produto->categoria_id == 1 ? 'selected' : '' }} value="1">Categoria 1</option>
                        <option {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }} value="2">Categoria 2</option>
                        <option {{ isset($produto) && $produto->categoria_id == 3 ? 'selected' : '' }} value="3">Categoria 3</option>
                    </select>
                </div>

                <div class="form_section__column">
                    <label for="fornecedor_id" class="form_section__column-label">Fornecedor</label>
                    <select name="fornecedor_id" id="fornecedor_id" class="form_section__column-input">
                        <option {{ isset($produto) && $produto->fornecedor_id == 1 ? 'selected' : '' }} value="1">Fornecedor 1</option>
                        <option {{ isset($produto) && $produto->fornecedor_id == 2 ? 'selected' : '' }} value="2">Fornecedor 2</option>
                        <option {{ isset($produto) && $produto->fornecedor_id == 3 ? 'selected' : '' }} value="3">Fornecedor 3</option>
                    </select>
                </div>


                <div class="form_section__column">
                    <label for="valor" class="form_section__column-label">Valor</label>
                    <input type="number" name="valor" id="valor" class="form_section__column-input" value="{{ ($produto->valor ?? '') }}">
                </div>
            </div>

            <div class="form_section__column">
                <label for="quantidade" class="form_section__column-label">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form_section__column-input" value="{{ ($produto->quantidade ?? '') }}">
            </div>
            <div class="form_row">
                <label for="img_upload" class="form_row__label">Adicionar imagens</label>
                <input type="file" name="img_upload" id="img_upload">
            </div>

            <div class="form_action">
                <button type="submit" value="salvar" name="salvar" class="form_action__save">Salvar</button>
            </div>
        </form>
    </div>
@endsection
