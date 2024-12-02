@extends("user._layouts.user")
@section('conteudo')
    <div class="navbarCheckout">
        <p>
            Carrinho >
        </p>
        <a href="{{ route('cart.enderecos') }}">
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
                <section>
                    <input type="radio" name="pix">
                    <label for="pix">Pix (10% de desconto)</label>
                </section>
            </div>
            <div class="checkoutContent_informacoes__pagamento">
                <section>
                    <input type="radio" name="pix">
                    <label for="pix">Boleto</label>
                </section>
            </div>
            <div class="checkoutContent_informacoes__pagamento">
                <section>
                    <input type="radio" name="pix">
                    <label for="pix">Cartão de crédito</label>
                </section>
                <select name="vezes">
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}"> {{ $i }} </option>
                    @endfor
                </select>
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
                <a href="{{ route('cart.confirmacao') }}">Continuar</a>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/carrinho1.css')
@endpush
