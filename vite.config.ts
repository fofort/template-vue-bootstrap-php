import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'
import { resolve } from 'path'
import { rm } from 'node:fs/promises'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueDevTools(),
    
    {
      name: "Cleaning assets folder",
      async buildStart() {
        await rm(resolve(__dirname, './www/assets'), { recursive: true, force: true });
      }
    }
  ],

    build: {
      outDir: './www',
      emptyOutDir: false, // also necessary
    },
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
})
