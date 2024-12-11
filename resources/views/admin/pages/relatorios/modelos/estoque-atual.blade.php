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

<h2>Estoque atual</h2>
<span>Categoria: {{ $nomeCategoria != null ? $nomeCategoria->nome : 'Todas'}}</span><br><br>
<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>SKU</th>
        <th>Quantidade</th>
    </tr>
    </thead>
    <tbody>
    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->sku }}</td>
            <td>{{ $produto->quantidade }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>