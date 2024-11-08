<head>
    @vite('resources/css/formulario-produtos.css')
</head>

<body>
    <div class="container">
        <form action="save" method="post" enctype="multipart/form-data" class="form">
            <div class="form_row">
                <label for="nome" class="form_row__label">Nome</label>
                <input type="text" name="nome" id="nome" class="form_row__input">
            </div>


            <div class="form_row">
                <label for="descricao" class="form_row__label">Descrição</label>
                <textarea name="descricao" id="descricao" rows="5" cols="50" class="form_row__input"></textarea> 
            </div>


            <div class="form_section">
                <div class="form_section__column">
                    <label for="nome" class="form_section__column-label">SKU</label>
                    <input type="text" name="sku" id="sku" class="form_section__column-input">
                </div>

                <div class="form_section__column">
                    <label for="categoria" class="form_section__column-label">Categoria</label>
                    <select name="categoria" id="categoria" class="form_section__column-input">
                        <option value="1">Categoria 1</option>
                        <option value="2">Categoria 2</option>
                        <option value="3">Categoria 3</option>
                    </select>
                </div>


                <div class="form_section__column">
                    <label for="valor" class="form_section__column-label">Valor</label>
                    <input type="number" name="valor" id="valor" class="form_section__column-input">
                </div>
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
</body>