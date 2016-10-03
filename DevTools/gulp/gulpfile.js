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
    scripts: {
        assets: {
            dir: '../../Resources/assets/js/',
            files: [
                '../../Resources/assets/js/libs.min.js',
                '../../Resources/assets/js/main.js'
            ]
        },
        public: {
            dir: '../../Resources/public/js/',
            files: ['../../Resources/public/js/*.js']
        }
    },
    css: {
        assets: {
            dir: '../../Resources/assets/css/',
            files: ['../../Resources/assets/css/*.css']
        },
        public: {
            dir: '../../Resources/public/css/',
            files: ['../../Resources/public/css/*.css']
        }
    },
    scss: {
        assets: {
            dir: '../../Resources/assets/scss/',
            files: ['../../Resources/assets/scss/*.scss']
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
        .pipe(gulp.dest(options.scripts.assets.dir));
});

gulp.task('librarysStyles', ['bower'], function () {
    return gulp.src(plugins.mainBowerFiles({
            filter: ['**/*.css'],
            paths: options.bower
        }))
        .pipe(concatCSS('libs.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(options.css.assets.dir));
});

gulp.task('librarys', ['librarysScripts', 'librarysStyles']);

gulp.task('scripts', function() {
    return gulp.src(options.scripts.assets.files)
        .pipe(concatJS('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(options.scripts.public.dir));
});

gulp.task('sass', function() {
    return sass(options.scss.assets.files)
        .on('error', sass.logError)
        .pipe(gulp.dest(options.css.assets.dir))
});

gulp.task('css', ['sass'], function() {
    return gulp.src(options.css.assets.files)
        .pipe(concatCSS('style.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(options.css.public.dir))
        .pipe(gulp.dest('../../'))
});

gulp.task('styles', ['css']);

gulp.task('myAssets', ['styles', 'scripts']);

gulp.task('allTasks', ['myAssets', 'librarys']);