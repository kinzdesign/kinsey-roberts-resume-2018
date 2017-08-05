        </main>
<?php if(Page::$showSidebar) { ?>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
<?php Page::renderPartial('layout', 'sidebar'); ?>
        </div>
<?php } ?>
      </div>
    </div>
<?php # jQuery (necessary for Bootstrap's JavaScript plugins), with local fallback ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>
<?php # Latest compiled and minified JavaScript ?>
    <script src="/assets/js/resume.min.js?ts=<?php Config::echoBuildTime() ?>"></script>
  </body>
</html>