const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/markdown-table.js').vue({ version: 2 });
mix.styles('resources/css/app.css', 'public/css/markdown-table.css');
