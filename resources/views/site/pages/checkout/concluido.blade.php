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
        <p>
            Pagamento >
        </p>
        <p>
            Confirmação >
        </p>
        <p id="navbarCheckout_pSelected">
            Concluir
        </p>
    </div>
    <div class="checkoutTitle">
        <div class="checkoutTitle_produtos">
        </div>
    </div>
    <div class="checkoutFim">
        <h1>Compra finalizada!</h1>
        <p>Pedido #1532</p>
        <a href="{{ route('vitrine') }}">Clique aqui para voltar a tela inicial</a>
    </div>
    @endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
