var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build')

    .setPublicPath('/public')

    .addEntry('js/app', './assets/js/app.js')

    .addStyleEntry('css/app.css', './assets/css/app.css')

    .cleanupOutputBeforeBuild()

    .enableVueLoader()
;

module.exports = Encore.getWebpackConfig();
