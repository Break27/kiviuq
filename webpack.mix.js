const mix = require('laravel-mix');

const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.ts', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .alias({
        '@': 'resources/js',
    })
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.ts?$/,
                    loader: 'ts-loader',
                    exclude: [
                        /node_modules/,
                        /public/
                    ],
                    options: {
                        appendTsSuffixTo: [/\.vue$/]
                    },
                },
            ],
        },
        plugins: [
            //new BundleAnalyzerPlugin(),
        ],
        resolve: {
            extensions: ['*', '.js', '.jsx', '.ts', '.tsx', '.vue'],
        },
    });

if (mix.inProduction()) {
    mix.version();
}
