import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from "path"

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/backend/app.js',
                'resources/sass/backend/app.scss',
                'resources/js/frontend/app.js',
                'resources/sass/frontend/app.scss',
            ],
            refresh: true,
            valetTls: 'laravel-boilerplate.test'
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~coreui': path.resolve(__dirname, 'node_modules/@coreui/coreui')
        }
    },
})
