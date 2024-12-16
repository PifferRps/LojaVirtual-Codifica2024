@extends("site._layouts.site")
@section("conteudo")
    <div class="containerGeral" style="display: flex; width: 100%; justify-content: center; gap: 20px; padding: 20px;">
        <div class="containerLateral" style="flex: 0 0 250px; background-color: #2c3e50; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); height: calc(100vh - 200px); overflow-y: auto;">
            <a href="{{ route('site.meu-perfil.index') }}" style="padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                Meus dados
            </a>
            <a href="{{ route('site.meu-perfil.pedidos') }}" style="padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                Meus pedidos
            </a>
            <a href="{{ route('site.meu-perfil.enderecos') }}" style="padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                Meus endereços
            </a>
            <a href="{{ route('site.meu-perfil.editar-senha') }}" style="padding: 12px; text-decoration: none; color: white; font-size: 18px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; background-color: #34495e; transition: background-color 0.3s ease;">
                Alterar Senha
            </a>
        </div>

        <div class="containerGeral_principal" style="flex: 1; padding: 20px; background-color: #ecf0f1; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);     height: calc(100vh - 200px);
    overflow: auto;">
            @yield('conteudoPerfil')
        </div>
    </div>
@endsection

@push('style')
    @vite("resources/css/sidebar-perfil.css")
@endpush
