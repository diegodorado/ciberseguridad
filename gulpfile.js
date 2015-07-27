var gulp = require('gulp');
var args = require('yargs').argv;
var browserSync = require('browser-sync');
var config = require('./gulp.config')();
var del = require('del');
var $ = require('gulp-load-plugins')({lazy:true});
var port = process.env.PORT || config.defaultPort;

gulp.task('clean', function(done) {
    var delconfig = [].concat(config.build, config.temp);
    log('Cleaning: ' + $.util.colors.blue(delconfig));
    del(delconfig, done);
});

gulp.task('clean-styles', function(done) {
    clean(config.temp + '**/*.css', done);
});

gulp.task('clean-fonts', function(done) {
    clean(config.build + 'fonts/**/*.*', done);
});

gulp.task('clean-images', function(done) {
    clean(config.build + 'images/**/*.*', done);
});

gulp.task('clean-code', function(done) {
    var files = [].concat(
        config.temp + '**/*.js',
        config.build + '**/*.html',
        config.build + '**/*.js'
    );
    clean(files, done);
});

gulp.task('vet', function() {
    log('Analizing code with JsHint and JSCS');
    return gulp
      .src(config.alljs)
      .pipe($.if(args.verbose, $.print()))
      .pipe($.jscs())
      .pipe($.jshint())
      .pipe($.jshint.reporter('jshint-stylish', {verbose:true}))
      .pipe($.jshint.reporter('fail'))
    ;

});

gulp.task('styles', gulp.series('clean-styles', function() {
    log('Compling LESS --> CSS');
    return gulp
      .src(config.less)
      .pipe($.plumber())
      .pipe($.less())
      .pipe($.autoprefixer({browsers: ['last 2 version', '> 5%']}))
      .pipe(gulp.dest(config.temp))
    ;

}));

gulp.task('fonts', gulp.series('clean-fonts', function() {
    log('Copying fonts');
    return gulp
        .src(config.fonts)
        .pipe(gulp.dest(config.build + 'fonts'))
        ;
}));

gulp.task('images', gulp.series('clean-images', function() {
    log('Copying and compressing images');
    return gulp
        .src(config.images)
        .pipe($.imagemin({optimizationLevel:4}))
        .pipe(gulp.dest(config.build + 'images'))
        ;
}));

gulp.task('templatecache', gulp.series('clean-code', function() {
    log('Creating AngularJS $templateCache');

    return gulp
        .src(config.htmltemplates)
        .pipe($.minifyHtml({empty:true}))
        .pipe($.angularTemplatecache(
            config.templateCache.file,
            config.templateCache.options
        ))
        .pipe(gulp.dest(config.temp))
        ;
}));

gulp.task('wiredep', function() {
    log('Wire up the bower css and js and our app js into the html');
    var options = config.getWiredepDefaultOptions();
    var wiredep = require('wiredep').stream;
    return gulp
        .src(config.index)
        .pipe(wiredep(options))
        .pipe($.inject(gulp.src(config.js)))
        .pipe(gulp.dest(config.client + 'layouts/'))
        ;
});

gulp.task('inject', gulp.series(
    gulp.parallel('wiredep', 'styles', 'templatecache'),
    function() {
        log('Wire up the app css into the html, and call wiredep');
        return gulp
            .src(config.index)
            .pipe($.inject(gulp.src(config.css)))
            .pipe(gulp.dest(config.client + 'layouts/'))
            ;
    })

);

gulp.task('optimize', gulp.series(
    gulp.parallel('inject', 'fonts', 'images'),
    function() {
        log('Optimizing the js, css and html');
        var assets = $.useref.assets({searchPath: './'});
        var templateCache = config.temp + config.templateCache.file;
        var cssFilter = $.filter('**/*.css');
        var jsLibFilter = $.filter('**/lib.js');
        var jsAppFilter = $.filter('**/app.js');

        return gulp
            .src(config.index)
            .pipe($.plumber())
            .pipe($.inject(gulp.src(templateCache, {read:false}), {
                starttag: '<!-- inject:templates:js -->'
            }))
            .pipe(assets)
            .pipe(cssFilter)
            .pipe(cssFilter.restore())
            .pipe(jsLibFilter)
            .pipe(jsLibFilter.restore())
            .pipe(jsAppFilter)
            .pipe(jsAppFilter.restore())
            .pipe(assets.restore())
            .pipe($.useref())
            .pipe($.revReplace())
            .pipe(gulp.dest(config.build))
            ;
    })

);

gulp.task('build-dev', gulp.series('inject', function() {
    return gulp
        .src(config.indexTemp)
        .pipe($.plumber())
        .pipe($.inject(gulp.src(config.temp + config.templateCache.file, {read:false}), {
            starttag: '<!-- inject:templates:js -->'
        }))
        .pipe(gulp.dest(config.indexDest))
        ;
}));

gulp.task('serve-dev', gulp.series('build-dev', function() {
    startBrowserSync(true);
}));

gulp.task('bump', function() {
    var type = args.type;
    var version = args.version;
    var options = {};
    if (version) {
        options.version = version;
    } else {
        options.type = type;
    }

    return gulp
        .src(config.packages)
        .pipe($.bump(options))
        .pipe(gulp.dest(config.root))
        ;

});

////////////////

function changeEvent(event) {
    var srcPattern = new RegExp('/.*(?=/' + config.source + ')/');
    log('File ' + event.path.replace(srcPattern, '') + ' ' + event.type);
}

function startBrowserSync(isDev) {
    if (args.nosync || browserSync.active) {
        return;
    }

    log('Start browser-sync on port ' + port);

    if (isDev) {
        gulp.watch(
                [config.index, config.html, config.htmltemplates],
                gulp.series('build-dev', browserSync.reload)
            )
            .on('change', function(event) { changeEvent(event);});
        gulp.watch([config.less], gulp.series('styles'))
            .on('change', function(event) { changeEvent(event);});
    } else {
        gulp.watch(
                [config.less, config.js, config.html],
                gulp.series('optimize', browserSync.reload)
            )
            .on('change', function(event) { changeEvent(event);});
    }

    var options = {
        proxy: 'ciberseguridad.dev',
        port: 3000,
        files: isDev ? [
            config.client + '**/*.js',
            config.temp + '**/*.css'
        ] : [],
        ghostMode: {
            clicks: true,
            location: false,
            forms: true,
            scroll: true
        },
        injectChanges: true,
        logFileChanges: true,
        notify: true,
        reloadDelay: 1000
    };
    browserSync(options);
}

function clean(path, done) {
    log('Cleaning : ' + $.util.colors.blue(path));
    del(path, done);
}

function log(msg) {
    if (typeof(msg) === 'object') {
        for (var item in msg) {
            if (msg.hasOwnProperty(item)) {
                $.util.log($.util.colors.blue(msg[item]));
            }
        }

    }else {
        $.util.log($.util.colors.blue(msg));
    }
}
