<header class="header">
    <div class="header_container">
        <div class="header_container__img">
            <img src="" alt="imagem.teste">
        </div>
        <div class="header_container__search">
            <form action="">
                <label for="search">Buscar</label>
                <input type="text" name="search">
            </form>
        </div>
        <div class="header_container__cart">
            <i>carrinho</i>
        </div>

        @auth
            <div class="header_container__user-info">
                <p>Olá, {{ Auth::user()->name }}!</p>
                <div class="user-info__img">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Foto de perfil">
                </div>
                
                <div class="user-info__actions">
                    <a href="{{ route('profile') }}">Meu Perfil</a>
                    <a href="{{ route('orders') }}">Minhas Compras</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </div>
            </div>
        @else
            <div class="header_container_login">
                <button onclick="window.location.href='{{ route('user.auth.login') }}'">Logar</button>
                <a href="{{ route('user.auth.cadastro') }}">Criar conta</a>
            </div>
        @endauth
    </div>
    
    @include("user._components.navbar")
</header>
