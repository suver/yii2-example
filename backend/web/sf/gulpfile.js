var gulp        = require('gulp'),
    gutil       = require('gulp-util'),
    //inline      = require('rework-inline'),
    //csso        = require('gulp-csso'),
    uglify      = require('gulp-uglify'),
    jade        = require('gulp-jade'),
    //coffee      = require('gulp-coffee'),
    concat      = require('gulp-concat'),
    livereload  = require('gulp-livereload'), // Livereload plugin needed: https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei
    tinylr      = require('tiny-lr'),
    express     = require('express'),
    app         = express(),
    marked      = require('marked'), // For :markdown filter in jade
    path        = require('path'),
    server      = tinylr(),
    es          = require('event-stream'),
    stylus      = require('gulp-stylus'),
    ts          = require('gulp-typescript'),
    tsProject   = ts.createProject("./tsconfig.json"),
    ext_replace = require('gulp-ext-replace'),
    sourcemaps  = require('gulp-sourcemaps'),
    accord  = require('gulp-accord');
 
 
// --- Basic Tasks ---
gulp.task('style', function() {
  return gulp.src(['./src/assets/style/*.styl'])
      .pipe(sourcemaps.init())
      .pipe(accord('stylus'))
      .pipe(sourcemaps.write('.'))
      .on('error', console.log)
      .pipe( gulp.dest('./dist/assets/style/') )
      .pipe( livereload( server ));
});
 
gulp.task('js', function() {
    return gulp.src('./src/assets/scripts/*.ts').
        pipe(ts({
            noImplicitAny: true,
            declaration: true,
        })).
        pipe( uglify() ).
        pipe( gulp.dest('./dist/assets/js/')).
        pipe( livereload( server ));
});

gulp.task('templates', function() {
  return gulp.src('./src/*.jade').
    pipe(jade({
      pretty: true
    })).
    pipe(gulp.dest('./dist/')).
    pipe( livereload( server ));
});



gulp.task('libs', function() {
    return gulp.src('./src/assets/libs/**/*')
        .pipe(gulp.dest('./dist/assets/libs'))
        .pipe( livereload( server ));
});

gulp.task('express', function() {
  app.use(express.static(path.resolve('./dist')));
  app.listen(1337);
  gutil.log('Listening on port: 1337');
});

gulp.task('watch', function () {
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err);
    }

  gulp.watch('./src/assets/style/*.styl',['style']);

  gulp.watch('./src/libs/',['libs']);
 
    gulp.watch('./src/assets/scripts/*.js',['js']);

      gulp.watch('./src/assets/scripts/*.ts',['js']);
 
    gulp.watch('./src/*.jade',['templates']);
    
  });
});
 
// Default Task
gulp.task('default', ['js','style','templates','express','libs','watch']);
