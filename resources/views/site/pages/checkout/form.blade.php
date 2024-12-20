@extends("site._layouts.carrinho")
@section('conteudo')
    <div class="navbarCheckout">
        <a href="{{ route('site.checkout.carrinho') }}"><p>Carrinho ></p></a>
        <p id="navbarCheckout_pSelected">Endereço ></p>
        <p>Pagamento ></p>
        <p>Confirmação ></p>
        <p>Concluido</p>
    </div>
    <div class="checkoutTitle">
        <div class="checkoutTitle_produtos">
            <h1>Dados pessoais</h1>
        </div>
        <div class="checkoutTitle_resumo">
            Resumo
        </div>
    </div>
    <form action="{{ route('site.checkout.enderecos.salvar') }}" method="post" class="checkoutContent">
        @csrf
        <div class="checkoutContent_informacoes">
            @if($enderecos)
                @foreach($enderecos as $endereco)
                    <input type="hidden" name="id" value="{{ $endereco['id'] }}">
                    <input type="hidden" name="frete" value="{{ $endereco['valor_frete'] }}">
                    <section class="checkoutContent_informacoes__endereco">
                        <label>
                            <input type="radio" required name="teste">
                            <span class="checkoutContent_informacoes__endereco-radio">
                                <span>Rua: {{$endereco['rua']}}, Nº: {{ $endereco['numero'] }}</span>
                                <span>Bairro: {{$endereco['bairro']}} - {{ $endereco['cidade'] }} - {{ $endereco['estado'] }}</span>
                                <span>Cep: {{$endereco['cep']}}</span>
                            </span>
                            <span class="checkoutContent_informacoes__endereco-frete">Frete: R${{ number_format($endereco['valor_frete'], 2, ',', '.' ) }}</span>
                        </label>
                    </section>
                @endforeach
            @else
                <p style="display: flex; justify-content: center; align-items: center; gap: 0.2rem">Oops, nenhum endereço cadastrado. <a href="{{ route('site.meu-perfil.enderecos') }}" target="_blank"> Clique aqui </a> para registrar um novo!</p>
            @endif
        </div>
        <div class="checkoutContent_values">
            <section class="checkoutContent_values__total">
                <h1>Total:
                    R${{ number_format($valores[0]['valorTotal'], 2, ',', '.' )}} + Frete</h1>
            </section>
            <section class="checkoutContent_values__pix">
                <h6>A vista</h6>
                <h1>
                    R${{ number_format($valores[0]['valorDescontoPix'], 2, ',', '.' )}}</h1>
                <h6>Com 10% de desconto no pix</h6>
            </section>
            <section class="checkoutContent_values__cartao">
                <h6>ou em até 10x de</h6>
                <p class="checkoutContent_values__cartao-p">
                    <b>{{ number_format($valores[0]['valorParcelado'], 2, ',', '.' )}}</b>
                </p>
                <h6>sem juros no cartão</h6>
            </section>
            <div class="checkoutContent_values__button">
                <button>Avançar</button>
            </div>
        </div>
    </form>
@endsection
@push('style')
    @vite('resources/css/carrinho.css')
@endpush
