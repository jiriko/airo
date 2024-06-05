// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    devtools: {enabled: true},
    modules: ['@sidebase/nuxt-auth', '@formkit/nuxt', '@nuxtjs/tailwindcss'],
    formkit: {
        // Experimental support for auto loading (see note):
        autoImport: true
    },
    auth: {
        baseURL: 'http://localhost/api/auth',
        provider: {
            type: 'local',
            endpoints: {
                signIn: {path: '/login', method: 'post'},
                getSession:{ path: '/me', method: 'get' }
            },
            token: {signInResponseTokenPointer: '/access_token'},
        }
    }
})