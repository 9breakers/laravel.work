import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/admin/css/styles.css',
                'resources/admin/js/chart-area-demo.js',
                'resources/admin/js/chart-bar-demo.js',
                'resources/admin/js/datatables-simple-demo.js',
                'resources/admin/js/scripts.js',
            ],
            refresh: true,
        }),
    ],
});
