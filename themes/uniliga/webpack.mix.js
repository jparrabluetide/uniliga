let mix = require('laravel-mix')

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('@tailwindcss/postcss')
  ])
  .webpackConfig({
    externals: {
      jquery: 'jQuery' // Le dice a Webpack que no empaquete 'jquery', sino que espere que 'jQuery' exista globalmente.
    }
  })
  .sourceMaps()

// Agrega una configuración de monitoreo más inteligente.
// Esto le dice a Mix que solo se preocupe por los archivos que importas o modificas.
mix.options({
  // Este es el ajuste clave. Evita que Mix monitoree los archivos de salida
  // y entre en el bucle.
  hmrOptions: {
    host: 'localhost',
    port: 8080
  },
  // Evita que los archivos de salida generados por PurgeCSS activen una nueva compilación
  cleanCss: {
    level: 1
  },
  autoprefixer: true
})
