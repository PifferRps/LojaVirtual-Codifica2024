@extends("user._layouts.user")
@vite("resources/css/dados-clientes.css")
@section("conteudo")

<div class="blocoPrincipal">


        <div class="titulo"> DADOS DA MINHA CONTA<div>
        <div class="telaInformacoes">

            <div class="informacoes">
                <div class="dadosTitulos">NOME</div>
                <div class="dadosClientes">Example</div>
            </div>

            <div class="informacoes">
                <div class="dadosTitulos">DATA DE NASCIMENTO</div>
                <div class="dadosClientes">00/00/0000</div>
            </div>

            <div class="informacoes">
                <div class="dadosTitulos">DOCUMENTO</div>
                <div class="dadosClientes">111.222. 333-44</div>
            </div>

            <div class="informacoes">
                <div class="dadosTitulos">EMAIL</div>
                <div class="dadosClientes">emailexample@gmail.com</div>
            </div>

            <div class="informacoes">
                <div class="dadosTitulos">SENHA</div>
                <div class="dadosClientes">***********</div>
            </div>

                <div class="botaoEditar">EDITAR</div>
            


    </div>
@endsection
