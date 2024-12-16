@extends("site._layouts.perfil")
@section("conteudoPerfil")
    <div class="container_enderecos">
        <script>

            function limpa_formulário_cep() {
                document.getElementById('rua').value = ("");
                document.getElementById('bairro').value = ("");
                document.getElementById('cidade').value = ("");
                document.getElementById('estado').value = ("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    document.getElementById('rua').value = (conteudo.logradouro);
                    document.getElementById('bairro').value = (conteudo.bairro);
                    document.getElementById('cidade').value = (conteudo.localidade);
                    document.getElementById('estado').value = (conteudo.uf);
                } else {
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                var cep = valor.replace(/\D/g, '');

                if (cep != "") {

                    var validacep = /^[0-9]{8}$/;

                    if (validacep.test(cep)) {

                        document.getElementById('rua').value = "...";
                        document.getElementById('bairro').value = "...";
                        document.getElementById('cidade').value = "...";
                        document.getElementById('estado').value = "...";

                        var script = document.createElement('script');

                        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                        document.body.appendChild(script);

                    } else {
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } else {
                    limpa_formulário_cep();
                }
            };

        </script>
        <div class="container_enderecos__edit">
            <form action="{{ route('site.meu-perfil.atualizar-endereco')}}" method="post" style="width: 500px">
                @csrf
                @method('PUT')
                <input type="hidden" name="endereco_id" value="{{ $endereco->id }}">
                <label for="cep">CEP:</label>
                <input type="text" value="{{ $endereco->cep }}" name="cep" id="cep" class="form-control" maxlength="8" onblur="pesquisacep(this.value);" required>
                <label for="rua">Rua:</label>
                <input type="text" value="{{ $endereco->rua }}" name="rua" id="rua" class="form-control" required>
                <label for="bairro"> Bairro:</label>
                <input type="text" value="{{ $endereco->bairro }}" name="bairro" id="bairro" class="form-control" required>
                <label for="cidade"> Cidade: </label>
                <input type="text" value="{{ $endereco->cidade }}"accept=""  name="cidade" id="cidade" class="form-control" required>
                <label for="estado"> Estado:</label>
                <input type="text" value="{{ $endereco->estado }}" name="estado" id="estado" class="form-control" required>
                <label for="numero"> Número:</label>
                <input type="text" value="{{ $endereco->numero }}" name="numero" id="numero" class="form-control" required>
                <label for="referencia"> Ponto de referência:</label>
                <input type="text" value="{{ $endereco->referencia }}" name="referencia" id="referencia" class="form-control">
                <label for="complemento"> Complemento:</label>
                <input type="text" value="{{ $endereco->complemento }}" name="complemento" id="complemento" class="form-control"><br>
                <button>Atualizar</button>
            </form>
        </div>
    </div>
@endsection

@push('style')
    @vite("resources/css/dados-clientes.css")
@endpush

