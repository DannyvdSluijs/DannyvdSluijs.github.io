import { defineConfig } from 'vite';

export default defineConfig({
    build: {
        outDir: '_site/media',
        emptyOutDir: false,
        rollupOptions: {
            input: 'resources/assets/app.js',
            output: {
                entryFileNames: 'app.js',
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name === 'style.css' || assetInfo.name === 'app.css') {
                        return 'app.css';
                    }

                    return '[name][extname]';
                },
            },
        },
    },
});
