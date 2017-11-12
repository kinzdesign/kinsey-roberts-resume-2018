'use strict';

var QUEUE_COUNT = 6; // In quick tests, 6 (43.7s) was faster than 4 (45.9s), 8 (44.4s) or 12 (53.9s)

var gulp = require('gulp');
var critical = require('critical');
var fs = require('file-system');

var inline_critical = function (path) {
  return critical.generate({
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

var process_files_queue = function(q, i) {
  // base case, empty queue
  if(!q || q.length < 1)
    return;
  // pop a file to process
  var path = q.pop();
  // inline and get promise
  return inline_critical(path).then(() => {
    // output status
    console.log('   > inlined ' + path + ' on queue ' + i);
    // tail recursion
    process_files_queue(q, i);
  }).catch((reason) => {
    console.log(' ! error in ' + path + ' on queue ' + i);
    console.log(' ! ' + reason);
    // tail recursion
    process_files_queue(q, i);
  });
}

var build_and_launch_queues = function(n) {
  // array of queues to process in parallel
  var Qs = [];
  // initialize inner queues
  for (var i = 0; i < n; i++)
    Qs[i] = [];

  // indexer to split pages between queues
  var cur = 0;

  // recurse all html files in static folder
  fs.recurseSync('../static/', ['**/*.html'], function(filepath, relative, filename) {  
    // ignore PDFs (already inlined)
    if(relative.substr(0,4) != 'pdf\\') {
      // enqueue page in current queue
      Qs[cur].push(relative);
      // increment indexer with rollover at n
      cur = (cur + 1) % n;
    }
  });

  // kick-off queues
  for (var i = 0; i < n; i++)
    process_files_queue(Qs[i], i);
}

gulp.task('critical', [], function (cb) {
  console.log(' + Inlining critical path CSS using ' + QUEUE_COUNT + ' queues');
  // silence errors
  process.setMaxListeners(0);
  // kick off parallel queues to inline critical CSS
  build_and_launch_queues(QUEUE_COUNT);
});
