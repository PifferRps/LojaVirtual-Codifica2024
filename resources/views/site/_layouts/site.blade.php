<!doctype html>
<html lang="pt/br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/navbar.css')
    @stack("style")
    <title>Document</title>
</head>
<body>
@include("site._components.header")
@yield("conteudo")
</body>
</html>
