# LOJA VIRTUAL

### CODIFICA + 2024

## REQUISITOS:
- [Git](https://git-scm.com/downloads) - Controle de versão para clonar e gerenciar o repositório.
- [Node.js](https://nodejs.org/en/download/package-manager) - Execução de JavaScript no backend e gerenciamento de pacotes.
- [Docker Desktop](https://www.docker.com/products/docker-desktop) - Para rodar os containers do projeto.

## Passo a passo

1. **Clone o repositório**  
   Abra o `Windows PowerShell` e execute o comando:
    ```bash
    git clone git@github.com:PifferRps/LojaVirtual-Codifica2024.git
    ```

2. **Entre na pasta do projeto**  
   Navegue até o repositório recém-clonado:
    ```bash
    cd LojaVirtual-Codifica2024
    ```

3. **Configuração do arquivo de ambiente**  
   Copie o arquivo `.env.example` para `.env` e ajuste as configurações conforme necessário:
    ```bash
    cp .env.example .env
    ```

4. **Inicialização dos containers e instalação de dependências**  
   Execute o seguinte comando para subir os containers e instalar as dependências do PHP:

    ```bash
    docker compose up --build -d ; docker exec -it php /bin/bash -c "composer install && php artisan key:generate && php artisan migrate"
    ```
5. **Habilitar execução de scripts no PowerShell (para Windows)**

   Caso você esteja usando o Windows e veja um erro ao tentar executar comandos npm, talvez seja necessário habilitar a execução de scripts. Abra o PowerShell como administrador e execute:
   ```bash
   Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
   ```

5. **Instalação de dependências do Node.js**  
   No repositório, no terminal, execute:
    ```bash
    npm install ; npm run build
    ```

6. **Início do processo de desenvolvimento**  
   No repositório, inicie o servidor de desenvolvimento com:
    ```bash
       npm run dev
    ```

7. **Acesse a aplicação**  
   Abra o navegador e acesse a aplicação em:  
   [localhost](http://localhost)
