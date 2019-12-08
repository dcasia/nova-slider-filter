const mix = require('laravel-mix')

mix.setPublicPath('dist')
    .js('resources/js/filter.js', 'js')
    .babelConfig({
        presets: [ 'babel-preset-env' ],
        plugins: [ '@babel/plugin-proposal-nullish-coalescing-operator' ]
    })
