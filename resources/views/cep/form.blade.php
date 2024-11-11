<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api</title>
</head>
<body>

<form action="{{ route("api.post") }}" method="post">
    @csrf
    <label for="cep">Digite seu CEP</label>
    <input name="cep" type="number">
    <button>Enviar</button>
</form>

</body>
</html>
