<div class="sidebar">
    <img class="sidebar_img" src="{{ asset('img/logo_nome.png') }}" alt="nome da loja na logo">
    <div class="sidebar_opcoes">
        <a href="{{ route('dashboard.index') }}" style="border-top: 0.120rem solid rgb(167, 48, 48);">Dashboard</a>
        <a href="{{ route('produtos.index') }}">Produtos</a>
        <a href="{{ route('pedidos.index') }}">Pedidos</a>
        <a href="{{ route('clientes.index') }}">Clientes</a>
        <a href="{{ route('categorias.index') }}">Categorias</a>
        <a href="{{ route('relatorios.index') }}">Relátorios</a>
        <a href="/" target="_blank" style="font-weight: bold">Ver loja</a>
    </div>
</div>
