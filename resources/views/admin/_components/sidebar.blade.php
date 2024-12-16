<div class="containerGeral" style="display: flex; width: 100%; justify-content: center; gap: 20px; overflow: hidden">
    <div class="containerLateral" style="flex: 0 0 250px; max-height: 100vh; background-color: #2c3e50; padding: 20px; ; height: 100%; width: 300px; overflow-x: hidden; display: flex">
        <div class="sidebar">
            <img class="sidebar_img" src="{{ asset('img/codificamaislogo2.png') }}" alt="nome da loja na logo" style="max-width: 100%; max-height: 150px; object-fit: contain; margin: 0 auto; flex-shrink: 0">
            <div class="sidebar_opcoes">
                <a href="{{ route('dashboard.index') }}" style="display: block; padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                    Dashboard
                </a>
                <a href="{{ route('produtos.index') }}" style="display: block; padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                    Produtos
                </a>
                <a href="{{ route('pedidos.index') }}" style="display: block; padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                    Pedidos
                </a>
                <a href="{{ route('clientes.index') }}" style="display: block; padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                    Clientes
                </a>
                <a href="{{ route('categorias.index') }}" style="display: block; padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                    Categorias
                </a>
                <a href="{{ route('relatorios.index') }}" style="display: block; padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                    Relatórios
                </a>
            </div>
            <div style="margin-bottom: 20px">
                <a href="/" target="_blank" style="display: block; padding: 8px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease; text-align: center">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>  Ver loja
                </a>
            </div>
        </div>
    </div>

    <div class="containerGeral_principal" style="flex: 1; padding: 20px; background-color: #ecf0f1; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); height: 100%; overflow: auto;">
        @yield('conteudoAdmin')
    </div>
</div>
