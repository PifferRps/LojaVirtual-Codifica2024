import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/home-site.css',
                'resources/css/navbar.css',
                'resources/css/carrinho.css',
                'resources/css/formulario-site.css',
                'resources/css/criar-categorias.css',
                'resources/css/admin.css',
                'resources/css/categorias.css',
                'resources/css/app.css',
                'resources/css/pedidos.css',
                'resources/js/app.js',
                'resources/css/cadastro.css',
                'resources/css/produto.css',
                'resources/css/login.css',
                'resources/css/dados-clientes.css',
                'resources/css/meus-pedidos.css',
                'resources/css/formulario-produtos.css',
                'resources/js/dark-mode.js',
                'resources/css/sidebar-perfil.css',
                'resources/css/admin-clientes.css',
                'resources/css/header.css'
            ],
            refresh: true,
        }),
    ],
});
