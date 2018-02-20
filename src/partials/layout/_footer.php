    <footer class="footer">
      <nav class="container">
<?php $cols = Page::isStatic() ? 6 : 4; ?>
        <div class="row">
          <div class="col-xs-<?php echo $cols; ?> footer-left">
            &copy; <a href="mailto:kinsey.q.roberts@gmail.com" data-category="Contact" data-action="Footer - Email" title="Email kinsey.q.roberts@gmail.com">Kinsey Roberts</a>, 2017.
            <a href="https://github.com/kinzdesign/kinsey-roberts-resume-2018" title="GitHub repository" data-category="Footer" data-action="GitHub Click">
              <i class="fa fa-lg fa-github"></i>
              <span class="sr-only">GitHub</span>
              repository
            </a>
          </div>
<?php 
  if(!Page::isStatic())
    Page::renderPartial('layout', 'breakpoints'); 
?>
          <div class="col-xs-<?php echo $cols; ?> footer-right">
            <ul class="list-inline">
              <li>
                <a href="/search/<?php echo Page::cacheBreaker();?>" data-category="Footer" data-action="Search Click">Search</a>
              </li>
              <li>
                <a href="/privacy/<?php echo Page::cacheBreaker();?>" data-category="Footer" data-action="Privacy Policy Click">Privacy Policy</a>
              </li>
            </ul>
          </div>
      </nav>
    </footer>
