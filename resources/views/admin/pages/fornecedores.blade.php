@extends("admin._layouts.admin")
@vite("resources/css/fornecedores.css")
@section("conteudo")
    <div class="conteudo">
        <div class="coneteudo_main">
            <h1>Fornecedor</h1>            
            <div class="form">
                <input type="text" placeholder="Buscar Fornecedor"/>
                <button type="button">Buscar</button>
                <button class="button-forn" type="button">Adicionar Fornecedor</button>
            </div>
            <table class="conteudo_main__table">
                <thead>
                    <tr>
                        <th>Fornecedor</th>
                        <th>Produtos Vinculados</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="#" alt="foto" width="50" height="50">
                            <span>Teste</span>
                        </td>
                        <td>Teste</td>
                        <td>Teste</td>
                        <td>
                            <a href="#">Editar</a>
                            <a href="#">Visualizar</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection