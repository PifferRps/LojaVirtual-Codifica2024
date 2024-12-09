<header class="header">

    <div class="header_container">
        <div class="header_container__img">
            <a href="{{ route('site.pages.vitrine.produtos.list') }}"><img src="{{ asset('img/codificamaislogo.png') }}" alt="Logo CODIFICA+"></a>
        </div>
        <div class="header_container__search">
            <form action="">
                <input type="text" name="search" placeholder="Nome do produto">
                <button>Buscar</button>
            </form>
        </div>
        <div class="header_container__cart">
            <a href="{{ route('site.checkout.carrinho') }}"><i class="fas fa-cart-shopping"></i>
            </a>
        </div>

        <button id="darkModeToggle" class="dark-mode-toggle">
            <i class="fas fa-moon"></i>
        </button>

        @auth
            <div class="header_container__user-info">
                <p>Olá, {{ Auth::user()->cliente->nome ?? 'admin' }}!</p>
                <div class="user-info__img">
                    <img src="{{ asset('img/perfil.png') }}" alt="Foto de perfil">
                </div>

                <div class="user-info__actions">
                <a href="{{ route('site.meu-perfil.index') }}">
                    <i class="fas fa-user-circle"></i> Meu Perfil</a>
                <a href="{{route('pedidos.index')}}">
                        <i class="fas fa-shopping-bag"></i> Minhas Compras</a>
                <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i> Sair</a>
                </div>
            </div>
        @else
            <div class="header_container_login">
                <div>
                    <a href="{{ route('login') }}">Entre</a>
                </div>
                <p>ou</p>
                <a href="{{ route('cadastro.index') }}">Crie uma conta</a>
            </div>
        @endauth
    </div>

    <nav>
        <div>
            <a href="{{ route('site.porCategoria', 1) }}"><p>Eletrônicos</p></a>
        </div>
        <div>
            <a href="{{ route('site.porCategoria', 2) }}"><p>Cosméticos</p></a>
        </div>
        <div>
            <a href="{{ route('site.porCategoria', 3) }}"><p>Vestuário</p></a>
        </div>
        <div>
            <a href="{{ route('site.porCategoria', 4) }}"><p>Eletrodomésticos</p></a>
        </div>
    </nav>
    @vite('resources/css/navbar.css')
    @vite('resources/js/dark-mode.js')
</header>
