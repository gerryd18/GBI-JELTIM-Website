import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/css/footer.css',
                'resources/css/navbar.css',
                'resources/css/informations.css'  
            ],
            refresh: true,
        }),
    ],
});
