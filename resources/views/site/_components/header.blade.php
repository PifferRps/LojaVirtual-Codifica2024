<header class="header">
    <div class="header_container">
        <div class="header_container__img">
            <a href="{{ route('site.pages.vitrine.produtos.list') }}"><img src="" alt="imagem.teste"></a>
        </div>
        <div class="header_container__search">
            <form action="">
                <input type="text" name="search">
                <button>Buscar</button>
            </form>
        </div>
        <div class="header_container__cart">
            <a href="{{ route('site.checkout.carrinho') }}"><i>carrinho</i></a>
        </div>

        @auth
            <div class="header_container__user-info">
                <p>Olá, {{ Auth::user()->cliente->nome ?? 'admin' }}!</p>
                <div class="user-info__img">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Foto de perfil">
                </div>

                <div class="user-info__actions">
                    <a href="{{ route('perfil') }}">Meu Perfil</a>
                    <a href=" {{ route('pedidos') }}">Minhas Compras</a>
                    <a href="{{ route('logout') }}">Sair</a>
                </div>
            </div>
        @else
            <div class="header_container_login">
                {{--                <button onclick="window.location.href='{{ route('site.auth.login') }}'">Logar</button>--}}
                <a href="#">Criar conta</a>
            </div>
        @endauth
    </div>

    @include("site._components.navbar")
</header>
