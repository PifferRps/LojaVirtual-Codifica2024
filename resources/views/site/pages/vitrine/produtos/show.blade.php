@extends("site._layouts.site")
@section("conteudo")
    <div class="container_blocos">
        <div class="blocoPrincipal">
            <div class="conteudoProduto">
                <div class="imagemProduto">
                    <img src="{{ asset('img/1.jpg') }}" width="100%" height="100%" alt="Placeholder">
{{--                    <div class="imagemProdutoReferencia"></div>--}}
{{--                    <div class="imagemProdutoReferencia"></div>--}}
{{--                    <div class="imagemProdutoReferencia"></div>--}}
{{--                    <div class="imagemProdutoReferencia"></div>--}}
                </div>

                <div class="informacoesProduto">
                    <div class="blocoSuperior">
                        <div class="rotas">Home > Categoria ></div>
                        <div class="tituloProduto"> {{ $produto->nome }}</div>
                        <div class="descricaoSuperior">{{ $produto->sku }}</div>
                    </div>

                    <div class="blocoInferior">
                        <div class="tituloProduto"> R${{ number_format(num:$produto->valor, decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</div>
                        <div class="descricaoSuperior">A vista no pix 10% OFF</div>
                        <div class="descricaoInferior">R$ {{ number_format(num:$valorComDesconto, decimals: 2, decimal_separator: ',',thousands_separator: '.' )}}</div>
                        <div class="descricaoSuperior">Em até 10x de {{ number_format(num:$valorParcelado, decimals: 2, decimal_separator: ',',thousands_separator: '.' )}} sem juros</div>
                    </div>

                    <div class="botoesInferiores">
                        <form action="{{ route('adicionar-ao-carrinho', $produto->id) }}" method="get">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade">
                            <button> Adicionar ao Carrinho </button>
                        </form>

                    </div>
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

