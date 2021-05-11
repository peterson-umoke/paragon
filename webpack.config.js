const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            'admin': path.resolve('resources/js/Admin'),
            'user': path.resolve('resources/js/User'),
            'public': path.resolve('public'),
        },
    },
};
