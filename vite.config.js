import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '0.0.0.0',
    //     port: '5173',
    //     hmr: {
    //         host: 'localhost',
    //     },
    //     watch: {
    //         usePolling: true
    //     },
    //     cors: {
    //         origin: [
    //             'http://localhost:5173',
    //             'http://127.0.0.1:8000',
    //             'http://localhost',
    //             'http://127.0.0.1',
    //             'http://192.168.56.1:5173',
    //             'http://192.168.101.144:5173'
    //         ]
    //     }
    // }
});
