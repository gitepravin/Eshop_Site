import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',     // Your main JavaScript file
                'resources/sass/app.scss', // Your SCSS file
            ],
            refresh: true, // Enables hot reloading during development
        }),
    ],
});
