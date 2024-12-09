@extends("site._layouts.site")
@section('conteudo')
    <div class="navbarCheckout">
        <p>
            Carrinho >
        </p>
        <a href="{{ route('site.checkout.enderecos') }}">
            <p>
                Dados pessoais >
            </p>
        </a>
        <p id="navbarCheckout_pSelected">
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
            <h1>Pagamento</h1>
        </div>
        <div class="checkoutTitle_resumo">
            Resumo
        </div>
    </div>
    <div class="checkoutContent">
    <div class="checkoutContent_informacoes">
    <div class="checkoutContent_informacoes__pagamento">
        <section class="payment-card">
            <input type="radio" id="pix" name="payment_method">
            <label for="pix">
            <img src="img/pix.png" alt="Pix Icon" class="payment-icon">
                Pix <span class="payment-discount">(10% de desconto)</span>
            </label>
        </section>
    </div>
    <div class="checkoutContent_informacoes__pagamento">
        <section class="payment-card">
            <input type="radio" id="boleto" name="payment_method">
            <label for="boleto">
                <img src="img/boleto.png" alt="Boleto Icon" class="payment-icon">
                Boleto
            </label>
        </section>
    </div>
    <div class="checkoutContent_informacoes__pagamento">
        <section class="payment-card">
            <input type="radio" id="cartao" name="payment_method">
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
                <a href="{{ route('site.checkout.confirmacao') }}">Continuar</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
