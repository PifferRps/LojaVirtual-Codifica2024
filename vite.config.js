import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/home-site.css',
                'resources/css/navbar.css',
                'resources/css/checkout.css',
                'resources/css/formulario-site.css',
                'resources/css/criar-categorias.css',
                'resources/css/admin.css',
                'resources/css/carrinho1.css',
                'resources/css/categorias.css',
                'resources/css/app.css',
                'resources/css/pedidos.css',
                'resources/js/app.js',
                'resources/css/cadastro.css',
                'resources/css/login.css',
                'resources/css/dados-clientes.css'
            ],
            refresh: true,
        }),
    ],
});
