<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/login.css')
</head>
<body>
<main class="main">
    <img class="main__logo" src="logo.png" alt="logo">
    <section class="main__section">
        <form class="section__form" action="{{ route('user.auth.login') }}" method="">
            @csrf
            <label for="">Login</label>
            <input class="form__input" type="email" placeholder="Digite seu email">
            <input class="form__input" type="password" placeholder="Digite sua senha">
            <button class="button form__button" type="submit">Logar</button>
        </form>
        <a class="button section__a" href="cadastro">Crie sua conta</a>
    </section>
</main>
</body>
</html>
