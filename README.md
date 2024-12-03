# CODIFICA+ 2024

---

## LOJA VIRTUAL

## REQUISITOS
Para rodar este projeto, recomendamos o uso do WSL (Windows Subsystem for Linux) no Windows, com o Ubuntu instalado. Você pode seguir o passo a passo da Microsoft para instalar o WSL:
- [WSL](https://learn.microsoft.com/pt-br/windows/wsl/install) - (caso esteja no Windows) Subsistema Windows para Linux (WSL)

Além disso, instale as seguintes tecnologias no sistema Linux:

- [Git](https://git-scm.com/downloads) - Controle de versão para clonar e gerenciar o repositório.
- [Node.js](https://nodejs.org/en/download/package-manager) - Execução de JavaScript no backend e gerenciamento de pacotes.
- [Docker Engine](https://docs.docker.com/engine/install/ubuntu) - Para rodar os containers do projeto.

## Passo a Passo

1. **Clone o repositório**  
   Abra o `Ubuntu no WSL` e execute o comando:
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
   docker compose up --build -d
   ```

5. **Configuração do Laravel**  
   Instale o composer, gere a chave da aplicação e rode as migrações:
   ```bash
   docker exec -it php_codifica /bin/bash -c "composer install"
   docker exec -it php_codifica /bin/bash -c "php artisan key:generate"
   docker exec -it php_codifica /bin/bash -c "php artisan migrate"
   ```

6. **Instalação de dependências do Node.js**  
   No terminal, dentro do repositório, execute:
   ```bash
   npm install
   ```

7. **Compilação dos ativos do projeto**  
   Compile os arquivos do projeto com:
   ```bash
   npm run build
   ```

8. **Início do processo de desenvolvimento**  
   Inicie o servidor de desenvolvimento com:
   ```bash
   npm run dev
   ```

9. **Acesse a aplicação**  
   Abra o navegador e acesse a aplicação em:  
   [localhost](http://localhost)

--- 
