        </main>
<?php if(Page::showSidebar()) {
        if(Page::$offCanvasSidebar) { ?>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
<?php   } else { ?>
        <div class="col-xs-12 col-sm-3" id="sidebar">
          <a name="skills"></a>
<?php   } ?>
<?php Page::renderPartial('layout', 'sidebar'); ?>
        </div>
<?php } ?>
      </div>
    </div>
<?php 
  Page::renderPartial('layout', 'footer');
  Page::renderPartial('layout', 'scripts'); 
?>
  </body>
</html>