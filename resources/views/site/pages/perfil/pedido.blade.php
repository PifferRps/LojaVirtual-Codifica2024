@extends("site._layouts.perfil")

@section("conteudoPerfil")
    <section style="width: 100%; max-width: 1000px; margin: 0 auto; padding: 20px; background-color: white">
        <h1 style="text-align: center; margin-bottom: 30px;">Informações do Pedido</h1>

        <section style="margin-top: 30px;">
            <!-- Informações do pedido e status -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 30px;">
                <div style="font-weight: bold; font-size: 18px;">
                    <span>Pedido: #{{ $pedido->id }}</span><br>
                    <span>Status: {{ $pedido->status->status }}</span>
                </div>
            </div>

            <!-- Pagamento e Endereço -->
            <div style="display: flex; gap: 30px;">
                <!-- Informações de Pagamento -->
                <div style="flex: 1; display: flex; flex-direction: column;">
                    <div style="font-weight: bold; font-size: 18px; margin-bottom: 10px;">Pagamento</div>
                    @if($pedido->formaPagamento->id == 1)
                        <span>{{ $pedido->formaPagamento->nome }} (10% de Desconto)</span>
                    @elseif($pedido->formaPagamento->id == 3)
                        <span>{{ $pedido->formaPagamento->nome }} ({{$pedido->parcelas}}x sem juros)</span>
                    @else
                        <span>{{ $pedido->formaPagamento->nome }}</span>
                    @endif

                    <div style="font-weight: bold; font-size: 18px; margin-top: 30px;">Endereço</div>
                    <span>CEP: {{ $pedido->endereco->cep }}</span>
                    <span>Rua: {{ $pedido->endereco->rua }}</span>
                    <span>Número: {{ $pedido->endereco->numero }}</span>
                    <span>Bairro: {{ $pedido->endereco->bairro }}</span>
                    <span>Estado: {{ $pedido->endereco->estado }}</span>
                    @if($pedido->endereco->complemento)
                        <span>Complemento: {{ $pedido->endereco->complemento }}</span>
                    @endif
                    @if($pedido->endereco->referencia)
                        <span>Referência: {{ $pedido->endereco->referencia }}</span>
                    @endif
                </div>

                <!-- Total pago -->
                <div style="flex: 0.5; display: flex; flex-direction: column; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                    <div style="font-weight: bold; font-size: 18px; text-align: center; margin-bottom: 20px;">Total Pago</div>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span>Subtotal</span>
                        <span>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span>Desconto</span>
                        <span>- R$ {{ number_format($pedido->desconto_total, 2, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span>Frete</span>
                        <span>R$ {{ number_format($pedido->endereco->valor_frete, 2, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-weight: bold; margin-bottom: 20px;">
                        <span>Valor Total</span>
                        <span>R$ {{ number_format(($pedido->valor_total + $pedido->endereco->valor_frete - $pedido->desconto_total), 2, ',', '.') }}</span>
                    </div>

                    @if($pedido->formaPagamento->id == 3)
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Parcelas</span>
                            <span>{{ $pedido->parcelas }}x de R$ {{ number_format((($pedido->valor_total + $pedido->endereco->valor_frete - $pedido->desconto_total) / $pedido->parcelas), 2, ',', '.') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tabela de Produtos -->
            <div style="margin-top: 30px;">
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                    <tr style="background-color: #f4f4f4; text-align: left;">
                        <th style="padding: 8px;">Produto</th>
                        <th style="padding: 8px; text-align: center;">Qnt</th>
                        <th style="padding: 8px; text-align: center;">Valor</th>
                        <th style="padding: 8px; text-align: center;">SubTotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedido->produtos as $produto)
                        <tr style="border-top: 1px solid #ddd;">
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

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
