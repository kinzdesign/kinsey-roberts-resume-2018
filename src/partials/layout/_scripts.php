<?php // use LABjs for parallel JS loading, CDN with local fallback ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/labjs/2.0.3/LAB.min.js"></script>
    <script>window.$LAB || document.write('<script src="/assets/js/vendor/LAB.min.js"><\/script>')</script>
<?php 

  // register FontAwesome CDN loader
  if(Page::$jsFontAwesome)
    Page::registerScript('https://use.fontawesome.com/ced7440677.js');

?>
    <script>
<?php 
  // jQuery (necessary for Bootstrap's JavaScript plugins), with local fallback 
  // loadOrFallback adapted from https://gist.github.com/mondaychen/1598350
  if(Page::$jsJQuery || Page::$jsResume) {
?>
      function loadOrFallback(scripts,idx) { 
        var successfully_loaded = false;  
        function testAndFallback() {   
          clearTimeout(fallback_timeout);
          if (successfully_loaded) return; // already loaded successfully, so just bail
          try {
            scripts.tester();
            successfully_loaded = true; // won't execute if the previous "test" fails   
            scripts.success();
          } catch(err) {
            if ( idx < scripts.src.length-1 ) {
              loadOrFallback(scripts,idx+1);
            }
            else if( scripts.loopRetry-- ){
              loadOrFallback(scripts,0);
            }
          }   
        }   
        
        if (idx == null) idx = 0;  
        $LAB.script(scripts.src[idx]).wait(testAndFallback);
        var fallback_timeout = setTimeout(testAndFallback, scripts.timeout); 
      }
      loadOrFallback({
        src: [  "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js",
          "/assets/js/vendor/jquery.min.js" ],
        tester: function() { jQuery(""); },
        success: function() {
<?php 
  // resume CSS (including Bootstrap) depends on jQuery, so load it now
    if(Page::$jsResume) {
?>
          $LAB
            .script('/assets/js/resume.min.js<?php echo Page::cacheBreaker(true); ?>');
<?php 
    } // end resume
?>
        },
        timeout: 1000, // only wait 1 second
        loopRetry: 2
      });
<?php
  } // end jQuery

  // parallel load any remaining scripts
  if(count(Page::$scripts) > 0) {
    echo '      $LAB';
    // emit each script
    foreach (Page::$scripts as $script) {
      echo "\r\n        .script('{$script}')";
    }
    echo ';';
  }
?>

    </script>
