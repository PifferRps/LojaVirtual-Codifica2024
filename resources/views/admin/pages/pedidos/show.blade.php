@extends('.admin._layouts.admin') {{--Modificar para user depois--}}
@section('conteudo')
    <section style="width: 800px">
        <h1>Informações de pedido</h1>

        <section style="margin-top: 30px">
            <div style="display: flex; justify-content: space-between">
                <span style="font-weight: bold">Pedido: {{ $pedido->id }}</span>
                <span style="font-weight: bold">Status: {{ $pedido->status->status }}</span>
            </div>

            <div style="display: flex; margin-top: 30px">
                <div style="display: flex; flex-direction: column; width: 100%">
                    <div style="display: flex; flex-direction: column; width: 100%">
                        <span style="font-weight: bold">Pagamento</span>
                        @if($pedido->formaPagamento->id == 1)
                            <span style="margin-top: 5px">{{ $pedido->formaPagamento->nome }} (10% de Desconto)</span>
                        @endif
                        @if($pedido->formaPagamento->id == 3)
                            <span style="margin-top: 5px">{{ $pedido->formaPagamento->nome }} ({{$pedido->parcelas}}x sem juros)</span>
                        @endif
                        @if($pedido->formaPagamento->id != 1 && $pedido->formaPagamento->id != 3)
                            <span style="margin-top: 5px">{{ $pedido->formaPagamento->nome }}</span>
                        @endif
                    </div>
                        <span style="font-weight: bold; margin-top: 10px">Endereço</span>
                        <span>CEP: {{ $pedido->endereco->cep }}</span>
                        <span>Rua: {{ $pedido->endereco->rua }}</span>
                        <span>Número: {{ $pedido->endereco->numero }}</span>
                        <span>Bairro: {{ $pedido->endereco->bairro }}</span>
                        <span>Estado: {{ $pedido->endereco->estado }}</span>
                        @if($pedido->endereco->complemento)
                            <span>Complemento: {{ $pedido->endereco->complemento }}</span>
                        @endif
                        @if($pedido->endereco->complemento)
                            <span>Complemento: {{ $pedido->endereco->referencia }}</span>
                        @endif
                    <div>

                    </div>
                </div>
                <div style="display: flex; flex-direction: column; width: 60%;">
                    <span style="display: flex; justify-content: center; font-weight: bold">Total pago</span>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Subtotal</span>
                        </div>
                        <div>
                            <span>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Desconto</span>
                        </div>
                        <div>
                            <span>- R$ {{ number_format($pedido->desconto_total, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Frete</span>
                        </div>
                        <div>
                            <span>R$ {{ number_format($pedido->endereco->valor_frete, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Valor total</span>
                        </div>
                        <div>
                            <span>R$ {{ number_format(($pedido->valor_total + $pedido->endereco->valor_frete - $pedido->desconto_total), 2, ',', '.') }}</span>
                        </div>
                    </div>
                    @if($pedido->formaPagamento->id == 3)
                        <div class="row" style="display: flex; justify-content: space-between">
                            <div>
                                <span>Parcelas</span>
                            </div>
                            <div>
                                <span>{{ $pedido->parcelas }}x de R$ {{ number_format((($pedido->valor_total + $pedido->endereco->valor_frete - $pedido->desconto_total) / $pedido->parcelas), 2, ',', '.') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div>

            </div>

            <div style="margin-top: 30px">
                <table style="width: 100%">
                    <tr>
                        <th colspan="3" style="text-align: left">Produto</th>
                        <th>Qnt</th>
                        <th>Valor</th>
                        <th>SubTotal</th>
                    </tr>
                    @foreach($pedido->produtos as $produto)
                    <tr>
                        <td colspan="3">{{ $produto->nome }}</td>
                        <td style="text-align:center">{{ $produto->pivot->quantidade_vendida }}</td>
                        <td style="text-align:center">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                        <td style="text-align:center">R$ {{ number_format(($produto->pivot->quantidade_vendida * $produto->valor), 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </section>
    </section>


@endsection

{{--Modificar para user depois--}}
