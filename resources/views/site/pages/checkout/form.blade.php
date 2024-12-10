@extends("site._layouts.carrinho")
@section('conteudo')
    <div class="navbarCheckout">
        <a href="{{ route('site.checkout.carrinho') }}">
            <p>
                Carrinho >
            </p>
        </a>
        <p id="navbarCheckout_pSelected">
            Dados pessoais >
        </p>
        <p>
            Pagamento >
        </p>
        <p>
            Confirmação >
        </p>
        <p>
            Concluir
        </p>
    </div>
    <div class="checkoutTitle">
        <div class="checkoutTitle_produtos">
            <h1>Dados pessoais</h1>
        </div>
        <div class="checkoutTitle_resumo">
            Resumo
        </div>
    </div>
    <div class="checkoutContent">
        <div class="checkoutContent_informacoes">
            <form action="">
                <div class="checkoutContent_informacoes__info1">
                    <div class="checkoutContent_informacoes__info1-labelInput50">
                        <label for="firstName">Primeiro nome</label>
                        <input type="text" name="firstName">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput50">
                        <label for="lastName">Último nome</label>
                        <input type="text" name="lastName">
                    </div>
                </div>
                <div class="checkoutContent_informacoes__info1">
                    <div class="checkoutContent_informacoes__info1-labelInput50">
                        <label for="cpf">CPF</label>
                        <input type="text" name="telefone" placeholder="999.999.999-99">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput50">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" placeholder="27 99999-9999">
                    </div>
                </div>
                <div class="checkoutContent_informacoes__info1">
                    <div class="checkoutContent_informacoes__info1-labelInput33">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput33">
                        <label for="rua">Rua</label>
                        <input type="text" name="rua">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput33">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro">
                    </div>
                </div>
                <div class="checkoutContent_informacoes__info1">
                    <div class="checkoutContent_informacoes__info1-labelInput50">
                        <label for="codade">Cidade</label>
                        <input type="text" name="cidade">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput50">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado">
                    </div>
                </div>
                <div class="checkoutContent_informacoes__info1">
                    <div class="checkoutContent_informacoes__info1-labelInput33">
                        <label for="numero">Número</label>
                        <input type="text" name="numero">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput33">
                        <label for="referencia">Ponto de referência</label>
                        <input type="text" name="referencia">
                    </div>
                    <div class="checkoutContent_informacoes__info1-labelInput33">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento">
                    </div>
                </div>
            </form>
        </div>
        <div class="checkoutContent_values">
            <section class="checkoutContent_values__total">
                <h1>Total: R$4.095,00</h1>
            </section>
            <section class="checkoutContent_values__pix">
                <h6>A vista</h6>
                <h1>R$3.685,5</h1>
                <h6>Com 10% de desconto no pix</h6>
            </section>
            <section class="checkoutContent_values__cartao">
                <h6>ou em até</h6>
                <p>10x <b>409,50</b></p>
                <h6>sem juros no cartão</h6>
            </section>
            <div class="checkoutContent_values__button">
                <a href="{{ route('site.checkout.pagamento') }}">Continuar</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
