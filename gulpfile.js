var gulp         = require('gulp'),
  postcss      = require('gulp-postcss'),
  browserSync  = require('browser-sync').create(),
  sass         = require('gulp-sass'),
  size         = require('postcss-size'),
  autoprefixer = require('autoprefixer'),
  concat       = require('gulp-concat'),
  uglify       = require('gulp-uglify'),
  selectors    = require('postcss-custom-selectors'),
  spritesmith  = require('gulp.spritesmith'),
  plumber      = require('gulp-plumber'),
  notify       = require("gulp-notify"),
    elixir       = require('laravel-elixir'),
  merge        = require('merge-stream');

/*------------------------------------*\
  Sass
\*------------------------------------*/

gulp.task('sass', function() {
  var processors = [
  autoprefixer({ browsers: ['last 20 versions'] }),
  // require('postcss-font-magician')({hosted: '../fonts'}),
   selectors,
   size,
  ];

  return gulp.src([
        'resources/assets/sass/reset.scss',
        'public/css/bootstrap.min.css',
      'resources/assets/sass/main.scss',
      //'public/css/sprite.css',
        'public/css/jquery.mCustomScrollbar.css',
      'resources/assets/sass/style.scss',])
  .pipe(plumber())
  .pipe(concat('style.css'))
  //.pipe(sass().on('error', error))
  .pipe(sass({outputStyle: 'compress'}))
  .pipe(postcss(processors))
  .pipe(gulp.dest('public/build/css/'));
});


/*------------------------------------*\
  Sprites
\*------------------------------------*/

gulp.task('sprite', function () {
  var spriteData = gulp.src('public/images/main/*.png').pipe(spritesmith({
  imgName: 'sprite.png',
  cssName: 'sprite.css',
  imgPath: 'public/images/sprite.png',
  padding: 1,
  cssOpts: {
  // for remove prefix icon-
  cssSelector: function (sprite) {
    return '.' + sprite.name;
  },
  algorithmOpts: {sort: true}
  }
}));

  var imgStream = spriteData.img
  .pipe(gulp.dest('public/images/'));

  var cssStream = spriteData.css
  .pipe(gulp.dest('public/build/css/'));

  return merge(imgStream, cssStream);
  // return spriteData.pipe(gulp.dest('css/'));
});


/*------------------------------------*\
    Uglify
\*------------------------------------*/

gulp.task('compress', function() {
  return gulp.src([
          'public/js/libs/jquery.js',
          'public/js/libs/bootstrap.min.js',
          'public/js/libs/jquery.mCustomScrollbar.concat.min.js',
          'public/js/common.js'])
  .pipe(plumber())
  .pipe(concat('global.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('public/build/js'));
});

// Laravel livereload
require('laravel-elixir-livereload');
elixir(function(mix) {
    mix.livereload();
});

/*------------------------------------*\
  Borwsersync server
\*------------------------------------*/

//gulp.task('serve', ['sass'], function() {
//  browserSync.init({
//  server: ""
//  });
//
//  // gulp.watch("/sass/*.scss", { interval: 500 }, ['sass']);
//  gulp.watch("css/style.css").on('change', browserSync.reload);
//  gulp.watch("index.html").on('change', browserSync.reload);
//});

/*------------------------------------*\
  Watch
\*------------------------------------*/

gulp.task('watch', function() {
  gulp.watch('resources/assets/sass/**/*.scss', { interval: 500 }, ['sass', 'notify']);
  gulp.watch('public/js/common.js', { interval: 500 }, ['compress', 'notify']);
  gulp.watch('public/images/main/*.png', { interval: 500 }, ['sprite']);
});

/*------------------------------------*\
  Notify
\*------------------------------------*/

gulp.task('notify', function() {
  var date = new Date();
  gulp.src("public/bild/css/style.css")
  .pipe(notify("Css was compiled! at " + date));
});

/*------------------------------------*\
  Run default gulp tasks
\*------------------------------------*/

gulp.task('default', ['sass', 'compress', 'watch']);


/**
***************************************************************
* =FUNCTIONS
***************************************************************
**/

// function like a plumber js
function error(error) {
  console.log(error.toString());
  this.emit('end');
}
