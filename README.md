# LOJA VIRTUAL

## REQUISITOS:
- [Git](https://git-scm.com/downloads)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Passo a passo

1. Abra o Windows PowerShell e clone o repositório
    ```BASH
    git clone git@github.com:PifferRps/LojaVirtual-Codifica2024.git
    ```

2. Navegue para o repositório do projeto
    ```BASH
    cd LojaVirtual-Codifica2024
    ```

3. Edite o arquivo `.env.example` para `.env`, e configure conforme o necessário:
    ```BASH
    cp .env.example .env
    ```
   
4. Inicie os containers:
    ```BASH
   docker compose up -d
    ```
   
5. Abra o terminal do container php-fpm
    ```BASH
   docker exec -it php /bin/bash
    ```

6. Execute o seguinte comando no terminal do container:
    ```BASH
    composer install \
    && composer update \
    && php artisan key:generate \
    && php artisan migrate
    ```

8. Por fim, acesse a aplicação:

    [Localhost](http://localhost)

