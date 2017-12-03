        </main>
<?php if(Page::showSidebar()) { ?>
        <div class="col-xs-12 col-sm-4 col-md-3" id="sidebar">
          <a name="skills"></a>
<?php Page::renderPartial('layout', 'sidebar'); ?>
        </div>
<?php } ?>
      </div>
    </div>
<?php 
  Page::renderPartial('layout', 'footer');
  Page::renderPartial('layout', 'scripts'); 
  Page::renderPartial('layout', 'searchbox'); 
?>
</body>
</html>