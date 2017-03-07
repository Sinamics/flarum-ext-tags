var gulp = require('flarum-gulp');

gulp({
  modules: {
    'sinamics/tags': [
      '../lib/**/*.js',
      'src/**/*.js'
    ]
  }
});
