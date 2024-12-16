@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <section style="display: flex; width: 100%; justify-content: center;">
        <div class="conteudo" style="width: 100%">
            <div class="conteudo_header" style="display: flex; justify-content: center; margin-bottom: 20px; font-weight: bold">
                <form action="" class="form" style="display: flex; gap: 15px; align-items: center; justify-content: center; width: 100%; max-width: 800px;">
                    <label for="status" style="margin-right: 10px;">Status:</label>
                    <select id="status" name="status" style="padding: 5px; font-size: 16px;">
                        <option value="0">Todos</option>
                        @foreach($status as $status_unitario)
                            <option value="{{ $status_unitario->id }}" {{ isset($_GET['status']) && $status_unitario->id == $_GET['status'] ? 'selected' : '' }}>{{ $status_unitario->status }}</option>
                        @endforeach
                    </select>

                    <label for="buscarPedidos" style="margin-right: 10px;">Buscar:</label>
                    <input type="text" name="buscarPedidos" placeholder=" ID do pedido" style="padding: 5px; font-size: 16px;">

                    <button type="submit" style="padding: 6px 12px; background-color: #007bff; color: white; border: none; font-size: 16px;">Buscar</button>
                </form>
            </div>
            <div class="mensagem_flash">
                @if (session()->has('mensagem'))
                    <div class="">{{ session('mensagem') }}</div>
                @endif
            </div>
            <div class="conteudo_main">
                <div class="conteudo_main__header" style="display: flex; justify-content: space-between; margin-bottom: 20px; font-weight: bold">
                    <div class="header-item" style="flex: 1; text-align: center;">Pedido</div>
                    <div class="header-item" style="flex: 1; text-align: center;">Valor</div>
                    <div class="header-item" style="flex: 1; text-align: center;">Status</div>
                    <div class="header-item" style="flex: 1; text-align: center;">Ação</div>
                </div>

                <div class="conteudo_main__pedidos" style="display: flex; flex-direction: column; gap: 15px; margin: 0px 15px">
                    @foreach($pedidos as $pedido)
                        <div class="conteudo_main__pedido" style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background-color: #f9f9f9; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                            <div class="pedido-item" style="flex: 1; text-align: center;">#{{ $pedido->id }}</div>
                            <div class="pedido-item" style="flex: 1; text-align: center;">R$ {{ number_format($pedido->valor_final, 2, ',', '.') }}</div>
                            <div class="pedido-item" style="flex: 1; text-align: center;">{{ $pedido->status->status }}</div>
                            <a href="{{ route('site.meu-perfil.pedido-show', $pedido) }}" class="pedido-item" style="flex: 1; text-align: center; color: #007bff; text-decoration: none; font-weight: bold;">Visualizar</a>
                        </div>
                    @endforeach
                    @if(empty($pedidos))
                        <div class="nenhum-pedido" style="text-align: center; font-size: 16px; color: #666;">Nenhum pedido realizado.</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush
