'use strict';

var gulp = require('gulp');
var critical = require('critical');
var fs = require('file-system');

var inline_critical = function (path) {
  critical.generate({
    // inline critical CSS
    inline: true,
    // minify it
    minify: true,
    // base directory
    base:   '../static/',
    // overwrite existing file
    src:    path,
    dest:   path,
    // process at 4 resolutions to get all breakpoints
    dimensions: [
      { width:  720, height: 1280 }, // xs
      { width:  800, height:  600 }, // sm
      { width: 1080, height: 1920 }, // md
      { width: 1920, height: 1080 }  // lg
    ]
  });
}

var process_run = function(isSkills, breakpoint, before) {
  // silence errors
  process.setMaxListeners(0);
  // recurse all html files in static
  fs.recurse('../static/', ['**/*.html'], function(filepath, relative, filename) {  
    // see if it starts with skills
    var startsWithSkills = (relative.substr(0,6) == "skills");
    // if processing skills
    if(isSkills) {
      // see if subdir comes before or after breakpoint
      if(startsWithSkills && (relative[7] <= breakpoint) == before)
        inline_critical(relative);
    } else {
      // non-skills go as-is, regardless of breakpoint
      if(!startsWithSkills)
        inline_critical(relative);
    }
  });
}

// split into 3 tasks to try to avoid crashing Chromium

gulp.task('critical-skills-a-i', [], function (cb) {
  process_run(true, 'i', true);
});

gulp.task('critical-skills-j-z', [], function (cb) {
  process_run(true, 'i', false);
});

gulp.task('critical-non-skills', [], function (cb) {
  process_run(false);
});
