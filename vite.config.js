import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import inject from "@rollup/plugin-inject";
import viteCompression from 'vite-plugin-compression';


export default defineConfig({
    plugins: [
        // inject({
        //     $: 'jquery',
        //     jQuery: 'jquery',
        // }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        viteCompression()
    ],
    optimizeDeps: {
        exclude: ['js-big-decimal']
    }
});
