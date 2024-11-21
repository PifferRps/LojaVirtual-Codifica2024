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
        <form class="section__form" action="{{ route('login.auth') }}" method="POST">
            @csrf
            <label for="">Login</label>
            <input class="form__input" name="email" type="email" placeholder="Digite seu email" required>
            <input class="form__input" name="password" type="password" placeholder="Digite sua senha" required>
            <button class="button form__button" type="submit">Logar</button>
        </form>
        <a class="button section__a" href="cadastro">Crie sua conta</a>
    </section>
</main>
</body>
</html>
