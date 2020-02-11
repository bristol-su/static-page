const mix = require('laravel-mix');

mix.setPublicPath('./public');

mix.js('resources/js/module.js', 'public/modules/static-page/js')
   .js('resources/js/components.js', 'public/modules/static-page/js')
    .sass('resources/sass/module.scss', 'public/modules/static-page/css');
