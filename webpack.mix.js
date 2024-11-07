let mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js') // Скомпилирует app.js и поместит в public/js
    .css('resources/css/app.css', 'public/css') // Скомпилирует app.js и поместит в public/js
    .sass('resources/sass/app.scss', 'public/css') // Скомпилирует app.scss и поместит в public/css
    .sourceMaps(); // Генерирует карты исходных файлов для отладки
