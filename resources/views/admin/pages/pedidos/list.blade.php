@extends("admin._layouts.admin")
@section("conteudoAdmin")
    <div style="padding: 20px; font-family: Arial, sans-serif;">
        <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <form action="" style="display: flex; gap: 15px; align-items: center;">
                <label for="status" style="font-weight: bold;">Status:</label>
                <select id="status" name="status" style="padding: 5px; font-size: 14px;">
                    <option value="0">Todos</option>
                    @foreach($status as $status_unitario)
                        <option value="{{ $status_unitario->id }}" {{ isset($_GET['status']) && $status_unitario->id == $_GET['status'] ? 'selected' : '' }}>{{ $status_unitario->status }}</option>
                    @endforeach
                </select>

                <label for="buscarPedidos" style="font-weight: bold;">Buscar</label>
                <input type="text" name="buscarPedidos" placeholder="ID do pedido" style="padding: 5px; font-size: 14px; width: 200px;">
                <button type="submit" style="padding: 6px 12px; font-size: 14px; cursor: pointer;">Buscar</button>
            </form>
        </div>

        <div class="mensagem_flash">
            @if (session()->has('mensagem'))
                <div>{{ session('mensagem') }}</div>
            @endif
                <div style="overflow-x: auto;">
                    <div style="display: flex; background-color: #f1f1f1; padding: 10px; font-weight: bold;">
                        <section style="flex: 1;">Número do pedido</section>
                        <section style="flex: 1;">Valor</section>
                        <section style="flex: 1;">Status</section>
                        <section style="flex: 0 0 150px; text-align: center;">Ações</section>
                    </div>
                    <hr>
                    @foreach($pedidos as $pedido)
                        <div style="display: flex; padding: 10px; align-items: center; border-bottom: 1px solid #ddd;">
                            <section style="flex: 1;">#{{ $pedido->id }}</section>
                            <section style="flex: 1;">R$ {{ number_format($pedido->valor_final, 2, ',', '.') }}</section>
                            <section style="flex: 1;">
                                <form action="{{ route('pedidos.update', $pedido) }}" method="post" style="display: flex; align-items: center;">
                                    @method('PUT')
                                    @csrf
                                    <select name="status_id" id="status_id" style="padding: 5px; font-size: 14px; margin-right: 10px;">
                                        <option value="{{ $pedido->status->id }}">{{ $pedido->status->status }}</option>
                                        @foreach ($status as $status_unitario)
                                            <option value="{{ $status_unitario->id }}">{{ $status_unitario->status }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" style="padding: 6px 12px; font-size: 14px; cursor: pointer;">OK</button>
                                </form>
                            </section>
                            <a href="{{ route('pedidos.show', $pedido) }}" style="color: #007bff; text-decoration: none; font-weight: bold; padding-left: 10px;">Visualizar pedido</a>
                        </div>
                    @endforeach

                    @if(empty($pedidos))
                        <div style="padding: 20px; text-align: center; font-size: 16px;">Nenhum pedido realizado.</div>
                    @endif
                </div>
        </div>
@endsection

@push('style')
    @vite("resources/css/pedidos.css")
@endpush
