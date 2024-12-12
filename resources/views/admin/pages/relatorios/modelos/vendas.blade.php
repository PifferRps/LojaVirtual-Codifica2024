<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque atual</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>

<h2>Relatório de Vendas</h2>
<table>
    <thead>
    <tr>
        <th>Número do Pedido</th>
        <th>Data</th>
        <th>Método</th>
        <th>Status</th>
        <th>Valor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vendas as $venda)
        <tr>
            <td>#{{ $venda->id }}</td>
            <td>{{ $venda->data_transacao }}</td>
            <td>{{ $venda->formaPagamento->nome }}</td>
            <td>{{ $venda->status->status }}</td>
            <td>R$ {{ number_format($venda->valor_final, 2, ',', '.') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
