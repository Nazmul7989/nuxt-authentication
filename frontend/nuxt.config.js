export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'frontend',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'shortcut icon', type: 'image/png', href: '~/assets/img/icons/icon-48x48.png' },
      { rel: 'preconnect', href: 'https://fonts.gstatic.com' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap' },

    ],
    //Global Js
    script: [
      { src: '/js/settings.js', type: 'text/javascript', body: true, defer: true },
      { src: '/js/app.js', type: 'text/javascript', body: true, defer: true },
      { src: '/js/custom.js', type: 'text/javascript', body: true, defer: true },
      { src: '/js/datatables.js', type: 'text/javascript', body: true, defer: true },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    '~/assets/css/custom.css',
    '~/assets/css/light.css',
  ],


  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '~/plugins/vform.js',
    '~/plugins/objectToFormData.js',
    { src: '~/plugins/swal.js', ssr: false },
    // '~/plugins/toastr.js',

  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    ['@nuxtjs/dotenv', { filename: '.env.production' }]
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
    ['@nuxtjs/dotenv', { filename: '.env.local' }]
  ],

  //nuxt auth package configuration
  auth: {
    strategies: {
      local: {
        token: {
          property: 'access_token',
          global: true,
          // required: true,
          // type: 'Bearer'
        },
        user: {
          property: false,
          autoFetch: true
        },
        endpoints: {
          register: { url: '/auth/register', method: 'post' },
          login: { url: '/auth/login', method: 'post' },
          logout: { url: '/auth/logout', method: 'post' },
          user: { url: '/auth/me', method: 'post' },
        }
      }
    }
  },

  //set middleware for authenticated route
  router: {
    middleware: ['auth']
  },

  publicRuntimeConfig: {
    axios: {
      baseURL: process.env.NUXT_API_BASE_URL
    },
    imageUrl: process.env.NUXT_API_IMAGE_URL
  },

  //axios configuration
  // axios: {
  //   baseURL : process.env.NUXT_API_BASE_URL,
  // },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
