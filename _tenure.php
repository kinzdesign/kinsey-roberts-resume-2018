<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['tenure'];
  $tenure = Tenure::getBySlug($slug);
  if(!$tenure) {
    // handle 404
    Page::error(404, "We could not find a tenure with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // build title
    $fullTitle = $tenure->name();
    if($tenure->category()) 
      $fullTitle = "$fullTitle - {$tenure->category()}";
    // add breadcrumbs
    Page::$breadcrumbs[$tenure->type()->name()] = $tenure->type()->url();
    Page::$breadcrumbs[$fullTitle] = $tenure->url();
    Page::$skills = $tenure->skills();
    Page::renderTop("$fullTitle | {$tenure->type()->name()}");
?>
          <h2 class="head-tenure"><?php 
            echo $tenure->name(); 
            if($tenure->category()) 
              echo " - {$tenure->category()}";
          ?></h2>
          <div class="tenure-date-block">
            <div class="tenure-duration"><?php echo $tenure->duration(); ?></div>
            <div class="tenure-dates"><?php echo $tenure->start(); ?>&ndash;<?php echo $tenure->end(); ?></div>
          </div>
          <a href="<?php echo $tenure->department()->url(); ?>" target="_blank" data-category="Tenure - <?php echo $tenure->name(); ?>" data-action="Department Click - <?php echo $tenure->department()->name(); ?>">
<?php     if($tenure->department()->organization()) { ?>
            <span class="tenure-organization"><?php echo $tenure->department()->organization()->name(); ?>,</span>
<?php     } ?>
<?php     if($tenure->department()->parent()) { ?>
            <span class="tenure-parent"><?php echo $tenure->department()->parent(); ?>,</span>
<?php     } ?>
            <span class="tenure-department"><?php echo $tenure->department()->name(); ?></span>
          </a>
          <div class="clearfix"></div>
<?php   // render static content
        if(!Page::renderPartial('tenures', $slug, "          <hr/>\n", "\n")) {
            // if no partial for this tenure, show bullets
          if($tenure->bullets()) { ?>
          <ul class="list-tenure-bullets">
<?php       foreach($tenure->bullets() as $bullet) { ?>
            <li><?php echo $bullet->text(); ?></li>
<?php       } ?>
          </ul><?php
          }
        }
        // render project list
        project_list($tenure->projects());
  } // end contents 
  Page::renderBottom();
