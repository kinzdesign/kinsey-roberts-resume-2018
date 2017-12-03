<?php # use LABjs for parallel JS loading, use local fallback or if DNT specified ?>
<script>if(!_dntEnabled()) document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/labjs/2.0.3/LAB.min.js"><\/script>');</script>
<script>window.$LAB || document.write('<script src="/assets/js/vendor/LAB.min.js"><\/script>');</script>
<script>
<?php 
  # jQuery (necessary for Bootstrap's JavaScript plugins), with local fallback 
  # loadOrFallback adapted from https://gist.github.com/mondaychen/1598350
  if(Page::$jsJQuery || Page::$jsResume) {
?>
      function loadOrFallback(scripts,idx) { 
        var successfully_loaded = false;  
        function testAndFallback() {   
          clearTimeout(fallback_timeout);
<?php # already loaded successfully, so just bail ?>
          if (successfully_loaded) return;
          try {
            scripts.tester();
<?php # won't execute if the previous "test" fails ?>
            successfully_loaded = true;   
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
<?php # don't load external scripts if DNT enabled ?>
        if(_dntEnabled() && scripts.src[idx].startsWith('http')) {
          loadOrFallback(scripts,idx+1);
        } else {
          $LAB.script(scripts.src[idx]).wait(testAndFallback);
          var fallback_timeout = setTimeout(testAndFallback, scripts.timeout); 
        }
      }
      loadOrFallback({
        src: [ "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js",
          "/assets/js/vendor/jquery.min.js" ],
        tester: function() { jQuery(""); },
        success: function() {
<?php 
  # resume CSS (including Bootstrap) depends on jQuery, so load it now
    if(Page::$jsResume) {
?>
          $LAB
            .script('/assets/js/resume.min.js<?php echo Page::cacheBreaker(true); ?>');
<?php 
    } # end resume
?>
        },
<?php # only wait 1 second ?>
        timeout: 1000,
        loopRetry: 2
      });
<?php
  } # end jQuery

  # parallel load any remaining scripts
  if(count(Page::$scripts) > 0 || Page::$jsFontAwesome) {
    echo '      $LAB';
    # emit each script
    foreach (Page::$scripts as $script) {
      echo "\r\n        .script('{$script}')";
    }
    # emit FontAwesome CDN loader, respecting DNT
    if(Page::$jsFontAwesome) 
      echo "\r\n        .script(_dntEnabled() ? '/assets/js/font-awesome.min.js' : 'https://use.fontawesome.com/ced7440677.js')";

    echo ';';
  }
?>
<?php #defer web-font loading ?>
  WebFontConfig = {
    google: { 
      families: ['Montserrat:700','Open Sans']
    }
  };

  (function(d) {
    var wf = d.createElement('script'), s = d.scripts[0];
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.async = true;
    s.parentNode.insertBefore(wf, s);
  })(document);
</script>
