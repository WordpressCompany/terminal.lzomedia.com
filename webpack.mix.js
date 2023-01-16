// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/app.js', 'dist').setPublicPath('dist');
mix.js('src/calendar.js', 'dist').setPublicPath('dist').react();
mix.sass('src/main.scss', 'dist').setPublicPath('dist');
