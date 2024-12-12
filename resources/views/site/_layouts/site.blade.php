<!doctype html>
<html lang="pt/br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack("style")
    <title>Codifica+</title>
</head>
<body>
@include("site._components.navbar")
@vite('resources/js/dark-mode.js')
@yield("conteudo")
</body>
</html>
