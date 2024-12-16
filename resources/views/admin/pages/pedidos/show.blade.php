@extends('.admin._layouts.admin') {{--Modificar para user depois--}}
@section('conteudoAdmin')
    <section style="height: 100%; padding: 20px; background-color: #f9f9f9; border-radius: 10px;">
        <h1 style="font-size: 26px; font-weight: bold; color: #333;">Detalhes do Pedido</h1>

        <section style="margin-top: 20px; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <span style="font-weight: bold; font-size: 20px; color: #333;">Pedido: {{ $pedido->id }}</span>
                <span style="font-weight: bold; font-size: 18px; }};">Status: {{ $pedido->status->status }}</span>
            </div>

            <div style="display: flex; margin-top: 20px;">
                <div style="flex: 1; margin-right: 20px;">
                    <div>
                        <span style="font-weight: bold; color: #444;">Pagamento</span>
                        @if($pedido->formaPagamento->id == 1)
                            <div><i class="fas fa-credit-card" style="margin-right: 5px;"></i><span>{{ $pedido->formaPagamento->nome }} (10% de Desconto)</span></div>
                        @elseif($pedido->formaPagamento->id == 3)
                            <div><i class="fas fa-credit-card" style="margin-right: 5px;"></i><span>{{ $pedido->formaPagamento->nome }} ({{$pedido->parcelas}}x sem juros)</span></div>
                        @else
                            <div><i class="fas fa-credit-card" style="margin-right: 5px;"></i><span>{{ $pedido->formaPagamento->nome }}</span></div>
                        @endif
                    </div>
                    <div style="margin-top: 15px;">
                        <span style="font-weight: bold; color: #444;">Endereço</span>
                        <div><i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i><span>CEP: {{ $pedido->endereco->cep }}</span></div>
                        <div><i class="fas fa-road" style="margin-right: 5px;"></i><span>Rua: {{ $pedido->endereco->rua }}</span></div>
                        <div><i class="fas fa-house-damage" style="margin-right: 5px;"></i><span>Número: {{ $pedido->endereco->numero }}</span></div>
                        <div><i class="fas fa-building" style="margin-right: 5px;"></i><span>Bairro: {{ $pedido->endereco->bairro }}</span></div>
                        <div><i class="fas fa-map" style="margin-right: 5px;"></i><span>Estado: {{ $pedido->endereco->estado }}</span></div>
                        @if($pedido->endereco->complemento)
                            <div><i class="fas fa-location-arrow" style="margin-right: 5px;"></i><span>Complemento: {{ $pedido->endereco->complemento }}</span></div>
                        @endif
                        @if($pedido->endereco->referencia)
                            <div><i class="fas fa-comment-dots" style="margin-right: 5px;"></i><span>Referência: {{ $pedido->endereco->referencia }}</span></div>
                        @endif
                    </div>
                </div>

                <div style="flex: 1; padding-left: 20px; background-color: #f5f5f5; border-radius: 8px; padding: 20px;">
                    <div style="text-align: center; font-weight: bold; margin-bottom: 10px; color: #444;">Resumo de Pagamento</div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <div><span>Subtotal</span></div>
                        <div><span>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</span></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <div><span>Desconto</span></div>
                        <div><span>- R$ {{ number_format($pedido->desconto_total, 2, ',', '.') }}</span></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <div><span>Frete</span></div>
                        <div><span>R$ {{ number_format($pedido->endereco->valor_frete, 2, ',', '.') }}</span></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <div><span><strong>Total</strong></span></div>
                        <div><strong>R$ {{ number_format(($pedido->valor_total + $pedido->endereco->valor_frete - $pedido->desconto_total), 2, ',', '.') }}</strong></div>
                    </div>

                    @if($pedido->formaPagamento->id == 3)
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <div><span>Parcelas</span></div>
                            <div><span>{{ $pedido->parcelas }}x de R$ {{ number_format((($pedido->valor_total + $pedido->endereco->valor_frete - $pedido->desconto_total) / $pedido->parcelas), 2, ',', '.') }}</span></div>
                        </div>
                    @endif
                </div>
            </div>

            <div style="margin-top: 30px;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                    <tr style="background-color: #e8e8e8;">
                        <th style="text-align: left; padding: 8px;">Produto</th>
                        <th style="text-align: center; padding: 8px;">Qtd</th>
                        <th style="text-align: center; padding: 8px;">Valor</th>
                        <th style="text-align: center; padding: 8px;">SubTotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedido->produtos as $produto)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 8px;">{{ $produto->nome }}</td>
                            <td style="text-align: center; padding: 8px;">{{ $produto->pivot->quantidade_vendida }}</td>
                            <td style="text-align: center; padding: 8px;">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td style="text-align: center; padding: 8px;">R$ {{ number_format(($produto->pivot->quantidade_vendida * $produto->valor), 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection


{{--Modificar para user depois--}}
