@extends("site._layouts.site")
@section("conteudo")
    <div class="container_blocos">
        <div class="blocoPrincipal">
            <div class="conteudoProduto">
                <div class="imagemProduto">
                    <img src="{{ asset($produto->imagem_1) }}" width="100%" height="100%" alt="{{ $produto->nome }}">
                </div>

                <div class="informacoesProduto">
                    <div class="blocoSuperior">
                        <div class="rotas">Home > Categoria ></div>
                        <div class="tituloProduto"> {{ $produto->nome }}</div>
                        <div class="descricaoSuperior">{{ $produto->sku }} - Estoque: {{ $produto->quantidade }}</div>
                    </div>

                    @if($produto->quantidade > 0)
                    <div class="blocoInferior">
                        <div class="tituloProduto"> R$ {{ number_format($produto->valor, 2, ',','.' ) }}</div>
                        <div class="descricaoSuperior">A vista no pix 10% OFF</div>
                        <div class="descricaoInferior">R$ {{ number_format(($produto->valor * 0.9), 2, ',','.' ) }}</div>
                        <div class="descricaoSuperior">Em até 10x de {{ number_format(($produto->valor / 10), 2, ',','.' )}} sem juros</div>
                    </div>

                    <div class="botoesInferiores">
                        <form action="{{ route('adicionar-ao-carrinho', $produto->id) }}" method="get">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade" value="1" min="1">
                            <button> Adicionar ao Carrinho </button>
                        </form>
                    </div>
                    @else
                        <div style="display: flex; align-items: center; justify-content: center; height: 70%; color: grey">
                            <h2>Produto indisponível</h2>
                        </div>
                    @endif
                    @if(session('mensagem'))
                        <div style="color: red" role="alert">
                            <span>{{ session('mensagem') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="detalhesProduto">
                <div class="titulo">Detalhes do Produto</div>
                <div class="descricao">{{ $produto->descricao }}</div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    @vite('resources/css/produto.css')
@endpush

