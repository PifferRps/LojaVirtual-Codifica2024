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
                        pagamento: </b>{{ $pagamento }}{{ isset($vezes) && $idPagamento == '3' ? ', ' . $vezes . 'x' : '' }}
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
                            <p>{{ number_format($produto['produto']->valor , 2, ',', '.') }}</p>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
        <div class="checkoutContent_values">
            <section class="checkoutContent_values__total">
                <h1>Subtotal:
                    R${{ number_format($valores[0]['valorTotal'],  2,  ',', '.' )}}</h1>
                    <h4>Frete: R${{ number_format($frete,  2,  ',', '.' )}}</h4>
            </section>
            <section class="checkoutContent_values__total">
                <h1>Total:
                    R${{ number_format($valores[0]['valorTotal']+$frete,  2,  ',', '.' )}}</h1>
            </section>
            <div class="checkoutContent_values__button">
                <a href="{{ route('site.checkout.concluido') }}">Finalizar compra</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
