@extends("site._layouts.carrinho")
@section('conteudo')
    <div class="navbarCheckout">
        <p>Carrinho ></p>
        <a href="{{ route('site.checkout.enderecos') }}"><p>Endereço ></p></a>
        <p id="navbarCheckout_pSelected">Pagamento ></p>
        <p>Confirmação ></p>
        <p>Concluído</p>
    </div>
    <div class="checkoutTitle">
        <div class="checkoutTitle_produtos">
            <h1>Pagamento</h1>
        </div>
        <div class="checkoutTitle_resumo">
            Resumo
        </div>
    </div>
    <form action="{{ route('site.checkout.pagamento.salvar') }}" method="post" class="checkoutContent">
        @csrf
        <div class="checkoutContent_informacoes">
            <div class="checkoutContent_informacoes__pagamento">
                <section class="payment-card">
                    <input type="radio" id="pix" required name="payment_method" value="1">
                    <label for="pix">
                        <img src="img/pix.png" alt="Pix Icon" class="payment-icon">
                        Pix <span class="payment-discount">(10% de desconto)</span>
                     </label>
                </section>
            </div>
            <div class="checkoutContent_informacoes__pagamento">
                <section class="payment-card">
                    <input type="radio" id="boleto" required name="payment_method" value="2">
                    <label for="boleto">
                        <img src="img/boleto.png" alt="Boleto Icon" class="payment-icon">
                        Boleto
                    </label>
                </section>
            </div>
            <div class="checkoutContent_informacoes__pagamento">
                <section class="payment-card">
                    <input type="radio" id="cartao" required name="payment_method" value="3">
                    <label for="cartao">
                        <img src="img/cartao.png" alt="Cartão Icon" class="payment-icon">
                        Cartão de crédito
                    </label>
                    <select name="vezes" class="installments-select">
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}"> {{ $i }}x sem juros </option>
                        @endfor
                    </select>
                </section>
            </div>
        </div>

        <div class="checkoutContent_values">
            <section class="checkoutContent_values__total">
                <h1>Total:
                    R${{ number_format($valores[0]['valorTotal'],  2,  ',', '.' )}}</h1>
                <h4>Valor frete: R${{ number_format($frete,  2,  ',', '.' )}}</h4>
            </section>
            <section class="checkoutContent_values__pix">
                <h6>A vista</h6>
                <h1>
                    R${{ number_format($valores[0]['valorDescontoPix'],  2,  ',', '.' )}}</h1>
                <h6>Com 10% de desconto no pix</h6>
                <h6>+ valor do frete</h6>
            </section>
            <section class="checkoutContent_values__cartao">
                <h6>ou em até 10x de</h6>
                <p class="checkoutContent_values__cartao-p">
                    <b>{{ number_format($valores[0]['valorParcelado'],  2,  ',', '.' )}}</b>
                </p>
                <h6>sem juros no cartão</h6>
                <h6>+ valor do frete</h6>
            </section>
            <div class="checkoutContent_values__button">
                <button>Continuar</button>
            </div>
        </div>
    </form>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
