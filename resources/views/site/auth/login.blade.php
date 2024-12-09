<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}">
    <title>Login</title>
    @vite('resources/css/login.css')
</head>
<body>
<main class="main">
    <img class="main__logo" src="{{ asset('img/codificamaislogo2.png')}}" alt="logo">
    <section class="main__section">
        <form class="section__form" action="{{ route('login.autenticar') }}" method="POST">
            @csrf
            <span>Bem vindo(a)!</span>
            <input class="form__input" name="email" type="email" placeholder="Digite seu email" required>
            <input class="form__input" name="password" type="password" placeholder="Digite sua senha" required>
            <button class="button form__button" type="submit">Logar</button>
        </form>
        <a class="button section__a" href="{{ route('cadastro.index') }}">Se não possuir uma conta, crie-a</a>
    </section>
</main>
@vite('resources/js/dark-mode.js')
</body>
</html>
