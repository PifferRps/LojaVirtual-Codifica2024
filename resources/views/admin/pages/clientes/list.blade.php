@extends("admin._layouts.admin")
@section("conteudoAdmin")
    <div style="height: 100%; margin: 0; padding: 20px; font-family: Arial, sans-serif; background-color: #f9f9f9; border-radius: 10px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <form action="" style="display: flex; align-items: center;">
                <label for="Search" style="margin-right: 10px; font-size: 16px; color: #333;">Buscar Clientes:</label>
                <input type="text" name="buscarClientes" placeholder="Digite o nome do cliente..." style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; margin-right: 10px;">
                <button type="submit" style="padding: 8px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Buscar</button>
            </form>
        </div>

        <div class="mensagem_flash" style="margin-bottom: 20px;">
            @if (session()->has('mensagem'))
                <div style="padding: 10px; background-color: #f1f1f1; border: 1px solid #ccc; border-radius: 5px; color: #333;">
                    {{ session('mensagem') }}
                </div>
            @endif
        </div>

        <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div style="font-weight: bold; font-size: 18px; color: #333; margin-bottom: 20px;">
                Clientes
            </div>

            <hr style="margin-bottom: 20px;">

            @foreach($clientes as $cliente)
                <div style="display: flex; justify-content: space-between; align-items: center;  border-bottom: 1px solid #ddd; margin-bottom: 10px;">
                    <section style="font-size: 16px; color: #444;">{{ $cliente->nome }}</section>
                    <a href="{{ route('clientes.edit', $cliente->id) }}">
                        <button style="padding: 5px 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Editar</button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@push('style')
    @vite('resources/css/admin-clientes.css')
@endpush
