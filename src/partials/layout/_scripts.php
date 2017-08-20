<?php // use LABjs for parallel JS loading, CDN with local fallback ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/labjs/2.0.3/LAB.min.js"></script>
    <script>window.$LAB || document.write('<script src="/assets/js/vendor/LAB.min.js"><\/script>')</script>
<?php 
  // jQuery (necessary for Bootstrap's JavaScript plugins), with local fallback 
  if(Page::$jsJQuery || Page::$jsResume) {
  ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>
<?php 
  }

  // register core JS scripts

  // FontAwesome CDN loader
  if(Page::$jsFontAwesome)
    Page::registerScript('https://use.fontawesome.com/ced7440677.js');
  // minified resume site JavaScript
  if(Page::$jsResume)
    Page::registerScript('/assets/js/resume.min.js' . Page::cacheBreaker(true));

  // emit each script
  foreach (self::$scripts as $script) {
    echo "    <script src=\"{$script}\"></script>\n";
  }
