# LOJA VIRTUAL

## REQUISITOS:
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Passo a passo

1. Abra o Windows PowerShell e clone o repositório
    ```BASH
    git clone git@github.com:PifferRps/LojaVirtual-Codifica2024.git
    ```

2. Mude para o repositório do projeto
    ```BASH
    cd LojaVirtual-Codifica2024
    ```

3. Copie os dados do arquivo .env.example para .env:
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
    cd /var/www/html \
    && composer install \
    && composer update \
    && chown -R $USER:www-data storage \
    && chown -R $USER:www-data bootstrap/cache \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache
    ```

7. Gere a encryption key:
    ```BASH
   php artisan key:generate
    ```

8. Rode o migrate:
    ```BASH
    php artisan migrate
    ```

9. Por fim, acesse a aplicação:

    [Localhost](http://localhost)

