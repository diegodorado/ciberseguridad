module.exports = function() {
    var client = './themes/src/';
    var clientApp = client +  'app/';
    var temp = './.tmp/';

    var config = {

        temp: temp,

        alljs: [
            './themes/src/**/*.js',
            './*.js'
        ],
        build: './themes/demo/',
        client: client,
        css: temp + 'styles.css',
        fonts: [
            './bower_components/font-awesome/fonts/**/*.*',
            client + 'fonts/**/*.*'
        ],
        html: clientApp + '**/*.html',
        htmltemplates: clientApp + '**/*.html',
        images: client + 'images/**/*.*',
        index: client + 'layouts/default.htm',
        indexTemp: temp + 'default.htm',
        indexDest: './themes/demo/layouts/',
        js: [
          clientApp + '**/*.module.js',
          clientApp + '**/*.js',
          '!' + clientApp + '**/*.spec.js',
        ],
        less: client + 'styles/*.less',
        bower: {
            json: require('./bower.json'),
            directory: './bower_components/',
            ignorePath: '../..'
        },
        packages: [
            './package.json',
            './bower.json'
        ],

        /**
        * template cache
        */
        templateCache: {
            file: 'templates.js',
            options: {
                module: 'app.core',
                standAlone: false,
                root: 'app/'
            }
        }

    };

    config.getWiredepDefaultOptions =  function() {
        var options = {
            bowerJson: config.bower.json,
            directory: config.bower.directory,
            ignorePath: config.bower.ignorePath,
        };
        return options;
    };

    return config;
};
