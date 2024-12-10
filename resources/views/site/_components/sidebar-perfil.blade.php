@extends("site._layouts.site")
@section("conteudo")
    <div class="containerGeral">
        <div class="containerLateral">
            <a href="{{ route('site.meu-perfil.index') }}"><section>Meus dados</section></a>
            <a href="{{ route('site.meu-perfil.pedidos') }}"><section>Meus pedidos</section></a>
            <a href="{{ route('site.meu-perfil.enderecos') }}"><section>Meus endereços</section></a>
            <a href="{{ route('site.meu-perfil.editar-senha') }}"><section>Alterar Senha</section></a>
        </div>
        <div class="containerGeral_principal">
            @yield('conteudoPerfil')
        </div>

    </div>
@endsection
@push('style')
    @vite("resources/css/sidebar-perfil.css")
@endpush
