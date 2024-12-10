<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}">
    <title>Cadastro de Usuário</title>
    @vite('resources/css/cadastro.css')
</head>

<body>

<div class="container">
    <img class="main__logo" src="{{ asset('img/codificamaislogo2.png')}}" alt="logo">

    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <h3>Cadastro de Usuário</h3>

            <input type="text" name="name" id="name" class="form-control" placeholder="Nome Completo" required>
            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" maxlength="14" required>
            Data de nascimento:
            <input type="date" name="data" id="data" class="form-control" required>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(27) 99999-9999" maxlength="14" required>
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar senha" required>
        </div>

        <div class="form-group">
            <h3>Endereço</h3>

            <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" maxlength="8" required>
            <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" required>
            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" required>
            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" required>
            <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" required>
            <input type="text" name="numero" id="numero" class="form-control" placeholder="Numero" required>
            <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Ponto de referência" required>
            <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
        document.getElementById('cpf').addEventListener('change', function() {
            const accountType = this.value;
        });
        
        function applyCpfMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }
        
        document.getElementById('cpf').addEventListener('input', function() {
            this.value = applyCpfMask(this.value);
        });
    </script>

    <script>
        document.getElementById('telefone').addEventListener('change', function() {
            const accountType = this.value;
        });
        
        function applyTelefoneMask(value) {
            return value
            .replace(/\D/g, '')
            .replace(/^(\d{2})(\d)/, '($1) $2')
            .replace(/(\d{5})(\d{4})$/, '$1-$2'); 
        }
        
        document.getElementById('telefone').addEventListener('input', function() {
            this.value = applyTelefoneMask(this.value);
        });
    </script>

</div>
@vite('resources/js/dark-mode.js')
</body>

</html>