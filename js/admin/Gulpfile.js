var gulp = require('flarum-gulp');

gulp({
  files: [
    'bower_components/html.sortable/dist/html.sortable.js'
  ],
  modules: {
    'sinamics/tags': [
      '../lib/**/*.js',
      'src/**/*.js'
    ]
  }
});
