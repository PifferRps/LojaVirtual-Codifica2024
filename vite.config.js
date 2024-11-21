import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/user.style.css',
                'resources/css/formulario-produtos.css',
                'resources/css/criarCategorias.css',
                'resources/css/admin.css',
                'resources/css/categorias.css',
                'resources/css/app.css',
                'resources/css/pedidos.css',
                'resources/js/app.js',
                'resources/css/cadastro.css',
                'resources/css/login.css'
            ],
            refresh: true,
        }),
    ],
});
