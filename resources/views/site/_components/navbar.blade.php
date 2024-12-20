@php
 $quantidadeCarrinho = array_sum(array_column(session('produtos', []), 'quantidade'));

@endphp

<header class="header">

    <div class="header_container">
        <div class="header_container__img">
            <a href="{{ route('site.pages.vitrine.produtos.list') }}"><img src="{{ asset('img/codificamaislogo2.png') }}" alt="Logo CODIFICA+"></a>
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
            @if($quantidadeCarrinho > 0)
                <span class="header_container__cart-quantidade">{{ $quantidadeCarrinho }}</span>
            @endif
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
                <p style="color: white">ou</p>
                <a href="{{ route('cadastro.index') }}">Crie uma conta</a>
            </div>
        @endauth
    </div>

    <nav>
        <select name="categorias" id="categorias"  style="display: flex; align-items: center;">
            <option value="0">Selecione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ isset($categoriaSelecionada) && $categoria->id == $categoriaSelecionada->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
            @endforeach
        </select>
        <div style="display: flex; align-items: center;">
            <a href="{{ route('site.porCategoria', 0) }}"><p>Todos</p></a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="{{ route('site.porCategoria', 1) }}"><p>Hardware</p></a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="{{ route('site.porCategoria', 2) }}"><p>Mouses</p></a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="{{ route('site.porCategoria', 3) }}"><p>Teclados</p></a>
        </div>
        <div style="display: flex; align-items: center;">
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
    @vite('resources/css/header.css')
    @vite('resources/js/dark-mode.js')
</header>
