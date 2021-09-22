const mix = require('laravel-mix');

mix.setPublicPath('./public');

mix.js('resources/js/module.js', 'public/modules/static-page/js').vue()
    .sass('resources/sass/module.scss', 'public/modules/static-page/css');

mix.webpackConfig({
    externals: {
        '@bristol-su/frontend-toolkit': 'Toolkit',
        'vue': 'Vue'
    }
});
