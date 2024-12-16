@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <section style="display: flex; width: 100%; justify-content: center;">
        <div class="conteudo" style="width: 100%">
            <div class="conteudo_header" style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
                <form action="" class="form" style="display: flex; gap: 15px; align-items: center; justify-content: flex-end; width: 100%; max-width: 800px;">
                    <a href="{{ route('site.meu-perfil.adicionar-endereco') }}" style="padding: 6px 12px; margin-right: 10px;background-color: #007bff; color: white; border: none; font-size: 16px; text-decoration: none; border-radius: 5px;">Adicionar Endereço</a>
                </form>
            </div>

            <div class="conteudo_main">
                <div class="conteudo_main__header" style="display: flex; justify-content: space-between; margin-bottom: 20px; font-weight: bold">
                    <div class="header-item" style="flex: 1; text-align: center;">Endereço</div>
                    <div class="header-item" style="flex: 1; text-align: center;">Ação</div>
                </div>

                <div class="conteudo_main__enderecos" style="display: flex; flex-direction: column; gap: 15px;">
                    @foreach($enderecos as $endereco)
                        <div class="conteudo_main__endereco" style="margin: 0px 15px;display: flex; justify-content: space-between; align-items: center; padding: 15px; background-color: #f9f9f9; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                            <div class="endereco-item" style="flex: 2; text-align: left;">
                                <span>Rua: {{$endereco['rua']}}, Nº: {{ $endereco['numero'] }}</span><br>
                                <span>Bairro: {{$endereco['bairro']}} - {{ $endereco['cidade'] }} - {{ $endereco['estado'] }}</span><br>
                                <span>Cep: {{$endereco['cep']}}</span>
                            </div>
                            <div class="endereco-item" style="flex: 1; text-align: center;">
                                <a href="{{ route('site.meu-perfil.editar-endereco', $endereco->id) }}" style="display: inline-block; padding: 6px 12px; background-color: #ffc107; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 5px;">Editar</a>
                                <form method="post" action="{{ route("site.meu-perfil.deletar-endereco", $endereco->id) }}" style="display: inline;">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" style="padding: 6px 12px; background-color: #dc3545; color: white; border: none; font-size: 16px; border-radius: 5px; cursor: pointer;">Deletar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    @if(empty($enderecos))
                        <div class="nenhum-endereco" style="text-align: center; font-size: 16px; color: #666;">Nenhum endereço cadastrado.</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
