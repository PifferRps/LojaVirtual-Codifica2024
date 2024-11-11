import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/user.style.css',
                'resources/css/app.css',
                'resources/js/app.js']
            ,
            refresh: true,
        }),
    ],
});
