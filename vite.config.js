import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/menuburger.js',
                'resources/js/validateUserRegister.js',
                'resources/js/bootstrap.js',
            ],
            refresh: true,
        }),
    ],
});
