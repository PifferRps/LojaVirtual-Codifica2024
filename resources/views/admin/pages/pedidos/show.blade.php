@extends('.admin._layouts.admin') {{--Modificar para user depois--}}
@section('conteudo')
    <section style="width: 800px">
        <h1>Informações de pedido</h1>

        <section style="margin-top: 30px">
            <div style="display: flex; justify-content: space-between">
                <span style="font-weight: bold">Pedido: 404040</span>
                <span style="font-weight: bold">Status: Concluído</span>
            </div>

            <div style="display: flex; margin-top: 30px">
                <div style="display: flex; flex-direction: column; width: 100%">
                    <span style="font-weight: bold">Pagamento</span>
                    <span style="margin-top: 5px">Cartão</span>
                </div>
                <div style="display: flex; flex-direction: column; width: 60%;">
                    <span style="display: flex; justify-content: center; font-weight: bold">Total pago</span>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Subtotal</span>
                        </div>
                        <div>
                            <span>$ 144,00</span>
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Frete</span>
                        </div>
                        <div>
                            <span>$ 15,96</span>
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Desconto</span>
                        </div>
                        <div>
                            <span>- R$ 14,40</span>
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: space-between">
                        <div>
                            <span>Valor total</span>
                        </div>
                        <div>
                            <span>$ 145,56</span>
                        </div>
                    </div>
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
                    <tr>
                        <td colspan="3">Computador A</td>
                        <td style="text-align:center">2</td>
                        <td style="text-align:center">R$ 1.000,00</td>
                        <td style="text-align:center">R$ 2.000,00</td>
                    </tr>
                    <tr>
                        <td colspan="3">Computador B</td>
                        <td style="text-align:center">2</td>
                        <td style="text-align:center">R$ 1.500,00</td>
                        <td style="text-align:center">R$ 1.500,00</td>
                    </tr>
                </table>
            </div>
        </section>
    </section>


@endsection

{{--Modificar para user depois--}}
