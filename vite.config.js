import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/images',
            ],
            refresh: true,
        }),
    ],

    build: {
        assetsDir: 'assets',
        rollupOptions: {
          input: 'resources/js/app.js',
          output: {
            assetFileNames: (assetInfo) => {
              let extType = assetInfo.name.split('.')[1];
              if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
                extType = 'img';
              }
              return `assets/${extType}/[name]-[hash][extname]`;
            },
          },
        },
    },

});
