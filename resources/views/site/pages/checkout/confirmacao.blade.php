@extends("site._layouts.carrinho")
@section('conteudo')
    <div class="navbarCheckout">
        <p>Carrinho ></p>
        <p>Dados pessoais ></p>
        <a href="{{ route('site.checkout.pagamento') }}"><p>Pagamento ></p></a>
        <p id="navbarCheckout_pSelected">Confirmação ></p>
        <p>Concluído</p>
    </div>
    <div class="checkoutTitle">
        <div class="checkoutTitle_produtos">
            <h1>Confirmação de dados</h1>
        </div>
        <div class="checkoutTitle_resumo">
            Resumo
        </div>
    </div>
    <div class="checkoutContent">
        <div class="checkoutContent_informacoes">
            <div class="checkoutContent_informacoes__dadosCliente">
                <h2>Informações do Cliente</h2>
                <p><b>Nome: </b>{{ $cliente->nome }}</p>
                <p><b>Documento: </b>{{ $cliente->cpf }}</p>
                <p><b>Rua: </b>{{ $enderecos[0]['rua'] }}<b> - Nº </b>{{ $enderecos[0]['numero'] }}</p>
                <p><b>Bairro: </b>{{ $enderecos[0]['bairro'] }} - {{ $enderecos[0]['cidade'] }}</p>
                <p><b>Forma de
                        pagamento: </b>{{ $pagamento }}{{ isset($vezes) && $pagamento == '3' ? ', ' . $vezes . 'x' : '' }}
                </p>
            </div>
            <div class="checkoutContent_informacoes__dadosProdutos">
                <h2>Produtos: </h2>
                @foreach($produtos as $produto)
                    <section class="checkoutContent_items__item">
                        <div class="checkoutContent_items__item-img">
                            <img src="{{ $produto['produto']->imagem_1}}" alt="imagemProduto">
                            <section>
                                <h3>Nome: {{ $produto['produto']->nome }}</h3>
                                <p>SKU: {{ $produto['produto']->sku }}</p>
                            </section>
                        </div>
                        <div class="checkoutContent_items__item-qt">
                            <label for="quantidade">Quantidade:</label>
                            <p> {{ $produto['quantidade'] }}</p>
                        </div>
                        <div class="checkoutContent_items__item-valor">
                            <h4>Valor:</h4>
                            <p>{{ $produto['produto']->valor }}</p>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
        <div class="checkoutContent_values">
            <section class="checkoutContent_values__total">
                <h1>Total:
                    R${{ number_format(num:$valores[0]['valorTotal'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</h1>
            </section>
            <section class="checkoutContent_values__pix">
                <h6>A vista</h6>
                <h1>
                    R${{ number_format(num:$valores[0]['valorDescontoPix'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</h1>
                <h6>Com 10% de desconto no pix</h6>
            </section>
            <section class="checkoutContent_values__cartao">
                <h6>ou em até 10x de</h6>
                <p class="checkoutContent_values__cartao-p">
                    <b>{{ number_format(num:$valores[0]['valorParcelado'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</b>
                </p>
                <h6>sem juros no cartão</h6>
            </section>
            <div class="checkoutContent_values__button">
                <a href="{{ route('site.checkout.salvar') }}">Finalizar compra</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
