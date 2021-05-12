const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '~Admin': path.resolve('resources/js/Admin'),
            '~User': path.resolve('resources/js/User'),
            '~': path.resolve('public'),
        },
    },
};
