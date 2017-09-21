<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['tenure'];
  $tenure = Tenure::getBySlug($slug);
  if(!$tenure) {
    // handle 404
    Page::error(404, "We could not find a tenure with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // add breadcrumbs
    $tenure->type()->queueBreadcrumb();
    $tenure->queueBreadcrumb();
    Page::$skills = $tenure->skills();
    Page::renderTop("{$tenure->extendedName()} | {$tenure->type()->name()}");
?>
          <h2 class="head-tenure" itemprop="jobTitle"><?php 
            echo $tenure->name(); 
            if($tenure->category()) 
              echo " - {$tenure->category()}";
          ?></h2>
          <div class="tenure-date-block">
            <div class="tenure-duration"><?php echo $tenure->duration(); ?></div>
            <div class="tenure-dates"><?php echo $tenure->start(); ?>&ndash;<?php echo $tenure->end(); ?></div>
          </div>
<?php     echo "          <span itemscope itemprop=\"{$tenure->type()->schemaProperty()}\" itemType=\"{$tenure->type()->schemaType()}\">\r\n";
          if($tenure->department()->url()) {
            echo "            <a href=\"{$tenure->department()->url()}\" target=\"_blank\" data-category=\"Tenure - {$tenure->name()}\" data-action=\"Department Click - {$tenure->department()->name()}\">\r\n";
          }
          if($tenure->department()->organization()) { ?>
              <span class="tenure-organization" itemprop="name"><?php echo $tenure->department()->organization()->name(); ?></span>,
<?php     } ?>
<?php     if($tenure->department()->parent()) { ?>
                <span class="tenure-parent"><?php echo $tenure->department()->parent(); ?>,</span>
<?php     } ?>
              <span itemscope itemprop="department" itemtype="http://schema.org/Organization">
<?php     if($tenure->department()->url())
            echo "                <span itemprop=\"url\" class=\"hidden\" aria-hidden=\"true\">{$tenure->department()->url()}</span>\r\n";

          echo "                <span class=\"tenure-department\" itemprop=\"name\">{$tenure->department()->name()}</span>\r\n"; ?>
              </span>
<?php     if($tenure->department()->url())
            echo "              ".Page::externalLinkIcon()."\r\n            </a>\r\n"; 
            echo "           <span itemscope itemprop=\"address\" itemtype=\"http://schema.org/PostalAddress\" class=\"hidden\" aria-hidden=\"true\">\r\n";
            if($tenure->department()->organization()->street())
              echo "             <span itemprop=\"streetAddress\">{$tenure->department()->organization()->street()}</span>\r\n";
            if($tenure->department()->organization()->city())
              echo "             <span itemprop=\"addressLocality\">{$tenure->department()->organization()->city()}</span>\r\n";
            if($tenure->department()->organization()->state())
              echo "             <span itemprop=\"addressRegion\">{$tenure->department()->organization()->state()}</span>\r\n";
            if($tenure->department()->organization()->zip())
              echo "             <span itemprop=\"postalCode\">{$tenure->department()->organization()->zip()}</span>\r\n";
            echo "             <span itemprop=\"addressCountry\">US</span>\r\n"; 
            echo "           </span>\r\n"; ?>
          </span>
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
