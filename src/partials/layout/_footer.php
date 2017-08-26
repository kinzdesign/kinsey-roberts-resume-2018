      <footer class="footer">
        <nav class="container">
<?php $cols = Page::isStatic() ? 6 : 4; ?>
          <div class="row">
            <div class="col-xs-<?php echo $cols; ?> footer-left">
              &copy; Kinsey Roberts, 2017
            </div>
<?php 
  if(!Page::isStatic())
    Page::renderPartial('layout', 'breakpoints'); 
?>
            <div class="col-xs-<?php echo $cols; ?> footer-right">
              <a href="/privacy/<?php echo Page::cacheBreaker();?>">Privacy Policy</a>
            </div>
        </nav>
      </footer>