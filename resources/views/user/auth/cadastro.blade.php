<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    @vite('resources/css/cadastro.css')
</head>
<body>

<div class="container">
    <h2>Cadastro de Usuário</h2>
    <form action="{{ route('user.auth.cadastro') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="password_confirmation">Confirmar Senha</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <span id="password-error" style="color: red; display: none;">As senhas não coincidem.</span>

        <script>
            document.querySelector('form').addEventListener('submit', function (e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        const errorSpan = document.getElementById('password-error');

        if (password !== confirmPassword) {
            e.preventDefault();
            errorSpan.style.display = 'block';
        } else {
            errorSpan.style.display = 'none';
        }
    });
        </script>

        <div class="form-group">
            <label>Tipo de Conta</label>
            <select name="account_type" id="account_type" class="form-control" required>
                <option value="">Selecione</option>
                <option value="fisica">Pessoa Física</option>
                <option value="juridica">Pessoa Jurídica</option>
            </select>
        </div>

        <div class="form-group" id="cpf-field" style="display: none;">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14">
        </div>

        <div class="form-group" id="cnpj-field" style="display: none;">
            <label for="cnpj">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control" maxlength="18">
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
    document.getElementById('account_type').addEventListener('change', function() {
        const accountType = this.value;
        document.getElementById('cpf-field').style.display = accountType === 'fisica' ? 'block' : 'none';
        document.getElementById('cnpj-field').style.display = accountType === 'juridica' ? 'block' : 'none';
    });

    function applyCpfMask(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    } // os dígitos do cpf vão ser formatados automaticamente, o mesmo com cnpj

    function applyCnpjMask(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1/$2')
            .replace(/(\d{4})(\d{1,2})$/, '$1-$2');
    }

    document.getElementById('cpf').addEventListener('input', function() {
        this.value = applyCpfMask(this.value);
    });

    document.getElementById('cnpj').addEventListener('input', function() {
        this.value = applyCnpjMask(this.value);
    });
</script>

</div>

</body>
</html>
