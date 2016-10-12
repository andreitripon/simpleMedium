var gulp        = require('gulp'),
    concatJS    = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    rename      = require('gulp-rename'),
    sass        = require('gulp-ruby-sass'),
    concatCSS   = require('gulp-concat-css'),
    cleanCSS    = require('gulp-clean-css'),
    bower       = require('gulp-bower'),
    plugins     = require("gulp-load-plugins")({
        pattern: ['gulp-*', 'gulp.*', 'main-bower-files'],
        replaceString: /\bgulp[\-.]/
    });

var options = {
    assets: {
        dir: '../../Resources/assets/',
        scripts: {
            dir: '../../Resources/assets/js/',
            files: [
                '../../Resources/assets/js/libs.min.js',
                '../../Resources/assets/js/main.js'
            ]
        },
        css: {
            dir: '../../Resources/assets/css/',
            files: ['../../Resources/assets/css/*.css']
        },
        scss: {
            dir: '../../Resources/assets/scss/',
            files: ['../../Resources/assets/scss/*.scss']
        }
    },
    public: {
        dir: '../../Resources/public/',
        scripts: {
            dir: '../../Resources/public/js/',
            files: ['../../Resources/public/js/*.js']
        },
        css: {
            dir: '../../Resources/public/css/',
            files: ['../../Resources/public/css/*.css']
        }
    },
    bower:{
        bowerDirectory: '../../Resources/assets/libs/',
        bowerrc: '../bower/.bowerrc',
        bowerJson: '../bower/bower.json',
        bowerSrc: '../bower'
    }
};

gulp.task('bower', function() {
    return bower({ cwd: options.bower.bowerSrc });
});

gulp.task('librarysScripts', ['bower'], function () {
    return gulp.src(plugins.mainBowerFiles({
            filter: ['**/*.js'],
            paths: options.bower
        }))
        .pipe(concatJS('libs.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(options.assets.scripts.dir));
});

gulp.task('librarysStyles', ['bower'], function () {
    return gulp.src(plugins.mainBowerFiles({
            filter: ['**/*.css'],
            paths: options.bower
        }))
        .pipe(concatCSS('libs.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(options.assets.css.dir));
});

gulp.task('librarys', ['librarysScripts', 'librarysStyles']);

gulp.task('scripts', function() {
    return gulp.src(options.assets.scripts.files)
        .pipe(concatJS('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(options.public.scripts.dir));
});

gulp.task('sass', function() {
    return sass(options.assets.scss.files)
        .on('error', sass.logError)
        .pipe(gulp.dest(options.assets.css.dir))
});

gulp.task('css', ['sass'], function() {
    return gulp.src(options.assets.css.files)
        .pipe(concatCSS('style.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(options.public.css.dir))
        .pipe(gulp.dest('../../'))
});

gulp.task('styles', ['css']);

gulp.task('myAssets', ['styles', 'scripts']);

gulp.task('allTasks', ['myAssets', 'librarys']);