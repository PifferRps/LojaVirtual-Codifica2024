@extends("site._layouts.carrinho")
@section('conteudo')
    <div class="navbarCheckout">
        <p id="navbarCheckout_pSelected">Carrinho ></p>
        <p>Endereço ></p>
        <p>Pagamento ></p>
        <p>Confirmação ></p>
        <p>Concluído</p>
    </div>
    <div class="checkoutTitle">
        <div class="checkoutTitle_produtos">
            <p>Produtos</p>
            <a href="{{ route('remover-tudo-do-carrinho') }}"><button>Remover Produtos</button></a>
        </div>
        <div class="checkoutTitle_resumo">
            <p>Resumo</p>
        </div>
    </div>
    <div class="checkoutContent">
        <div class="checkoutContent_items">
            @if(session('produtos'))
                @foreach($produtos as $produto)
                    <section class="checkoutContent_items__item">
                        <div class="checkoutContent_items__item-img">
                            <img src="{{ $produto['produto']->imagem_1}}" alt="imagemProduto">
                            <section>
                                <h3>{{ $produto['produto']->nome }}</h3>
                                <p>SKU: {{ $produto['produto']->sku}}</p>
                            </section>
                        </div>
                        <div class="checkoutContent_items__item-qt">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade" value="{{ $produto['quantidade'] }}">
                        </div>
                        <div class="checkoutContent_items__item-valor">
                            <h4>Valor unitário:</h4>
                            <p>R$ {{ number_format(num:$produto['produto']->valor, decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</p>
                        </div>
                        <div class="checkoutContent_items__item-valor">
                            <h4>Valor total:</h4>
                            <p>R$ {{ number_format(num:$produto['produto']->valor*$produto['quantidade'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</p>
                        </div>
                        <a href="{{ route('remover-do-carrinho', $produto['produto']->id) }}"><button>Excluir</button></a>
                    </section>
                @endforeach
            @else
                <p>Oops, seu carrinho está vazio! Clique <a href="{{ route('site.pages.vitrine.produtos.list') }}">aqui</a> para voltar a loja!</p>
            @endif

        </div>
        <div class="checkoutContent_values">
            <section class="checkoutContent_values__total">
                <h1>Total: R${{ number_format(num:$valores[0]['valorTotal'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}} + Frete</h1>
            </section>
            <section class="checkoutContent_values__pix">
                <h6>A vista</h6>
                <h1>R${{ number_format(num:$valores[0]['valorDescontoPix'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</h1>
                <h6>Com 10% de desconto no pix</h6>
            </section>
            <section class="checkoutContent_values__cartao">
                <h6>ou em até 10x de</h6>
                <p class="checkoutContent_values__cartao-p"><b>{{ number_format(num:$valores[0]['valorParcelado'], decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</b></p>
                <h6>sem juros no cartão</h6>
            </section>
            <div class="checkoutContent_values__button">
                <a href="{{ route('site.checkout.enderecos') }}">Continuar</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
