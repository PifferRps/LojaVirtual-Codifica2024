@extends('.admin._layouts.admin')
@section('conteudoAdmin')
    <form action="{{ route('clientes.update', $cliente->id) }}" method="post" style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        @isset($cliente)
            @method('PUT')
        @endisset
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Nome</label>
            <input type="text" name="nome" value="{{ $cliente->nome }}" style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Email</label>
            <input type="text" name="email" value="{{ $usuario[$cliente->id]->email }}" style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="senha" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">Senha</label>
            <input type="password" name="senha" style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="documento" style="display: block; font-size: 16px; color: #333; margin-bottom: 5px;">CPF</label>
            <input type="text" name="documento" value="{{ $cliente->documento }}" style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 98.5%; font-size: 16px;">Salvar</button>
    </form>
@endsection

