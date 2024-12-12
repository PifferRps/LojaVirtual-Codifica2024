<header class="header">

    <div class="header_container">
        <div class="header_container__img">
            <a href="{{ route('site.pages.vitrine.produtos.list') }}"><img src="{{ asset('img/codificamaislogo.png') }}" alt="Logo CODIFICA+"></a>
        </div>
        <div class="header_container__search">
            <form action="{{ route('site.pages.vitrine.produtos.pesquisa') }}">
                <input type="text" name="pesquisaProdutos" placeholder="Nome do produto">
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
                    @if(Auth::user()->user_level == 999)
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-user-circle"></i> Painel</a>
                    @else
                    <a href="{{ route('site.meu-perfil.index') }}">
                        <i class="fas fa-user-circle"></i> Meu Perfil</a>
                    <a href="{{route('pedidos.index')}}">
                        <i class="fas fa-shopping-bag"></i> Minhas Compras</a>
                    @endif
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
        <select name="categorias" id="categorias">
            <option value="0">Selecione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == $categoriaSelecionada->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
            @endforeach
        </select>
        <div>
            <a href="{{ route('site.porCategoria', 1) }}"><p>Hardware</p></a>
        </div>
        <div>
            <a href="{{ route('site.porCategoria', 2) }}"><p>Mouses</p></a>
        </div>
        <div>
            <a href="{{ route('site.porCategoria', 3) }}"><p>Teclados</p></a>
        </div>
        <div>
            <a href="{{ route('site.porCategoria', 4) }}"><p>Monitores</p></a>
        </div>
    </nav>
    
    <script>
        document.getElementById('categorias').addEventListener('change', function () {
            const categoriaId = this.value;
            if (categoriaId != 0) {
                window.location.href = `/categoria/${categoriaId}`;
            }
        });
    </script>
    @vite('resources/css/navbar.css')
    @vite('resources/js/dark-mode.js')
</header>