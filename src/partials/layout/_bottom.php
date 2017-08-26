        </main>
<?php if(Page::showSidebar()) { ?>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
<?php Page::renderPartial('layout', 'sidebar'); ?>
        </div>
<?php } ?>
      </div>
    </div>
<?php Page::renderPartial('layout', 'scripts'); ?>
  </body>
</html>