@extends("user._layouts.user")
@section('conteudo')
    <div class="navbarCheckout">
        <p id="navbarCheckout_pSelected">
            Carrinho >
        </p>
        <p>
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
            <p>
                Produtos
            </p>
            <button>
                Remover Produtos
            </button>
        </div>
        <div class="checkoutTitle_resumo">
            Resumo
        </div>
    </div>
    <div class="checkoutContent">
        <div class="checkoutContent_items">
            <section class="checkoutContent_items__item">
                <div class="checkoutContent_items__item-img">
                    <img src="{{ asset('img/4.jpg') }}" alt="imagemProduto">
                    <section>
                        <h3>Camisa Codifica+</h3>
                        <p>SKU: 182731273</p>
                    </section>
                </div>
                <div class="checkoutContent_items__item-qt">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" placeholder="1">
                </div>
                <div class="checkoutContent_items__item-valor">
                    <h4>Valor:</h4>
                    <p>R$90,00</p>
                </div>
                <button>Excluir</button>
            </section>
            <section class="checkoutContent_items__item">
                <div class="checkoutContent_items__item-img">
                    <img src="{{ asset('img/3.jpg') }}" alt="imagemProduto">
                    <section>
                        <h3>Mouse</h3>
                        <p>SKU: 5554852</p>
                    </section>
                </div>
                <div class="checkoutContent_items__item-qt">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" placeholder="1">
                </div>
                <div class="checkoutContent_items__item-valor">
                    <h4>Valor:</h4>
                    <p>R$15,00</p>
                </div>
                <button>Excluir</button>
            </section>
            <section class="checkoutContent_items__item">
                <div class="checkoutContent_items__item-img">
                    <img src="{{ asset('img/1.jpg') }}" alt="imagemProduto">
                    <section>
                        <h3>Notebook</h3>
                        <p>SKU: 5456484</p>
                    </section>
                </div>
                <div class="checkoutContent_items__item-qt">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" placeholder="1">
                </div>
                <div class="checkoutContent_items__item-valor">
                    <h4>Valor</h4>
                    <p>R$3990,00</p>
                </div>
                <button>Excluir</button>
            </section>
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
                <a href="{{ route('cart.enderecos') }}">Continuar</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho1.css')
@endpush
