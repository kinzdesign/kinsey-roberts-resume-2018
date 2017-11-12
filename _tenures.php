<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
  $headers = false;
  // try to load tenure type if specified
  if(isset(Page::$params['tenure-type'])) {
    $type = TenureType::getBySlug(Page::$params['tenure-type']);
    // ensure we got a type ('tenure-type' param could actually be an employer)
    if($type) {
      $headers = array($type);
      $type->queueBreadcrumb();
      Page::$title = $type->name();
      Page::$canonicalUrl = $type->canonicalUrl();
    }
  }
  $isHomepage = !$headers;
  // if headers not loaded, get all
  if($isHomepage) {
    $headers = TenureType::getAll();
    Page::$isHomepage = true;
    Page::$showBreadcrumbs = false;
    // show all skills
    Page::$skills = Skill::getAll();
    Page::$offCanvasSidebar = true;
    Page::$canonicalUrl = '/';
  }
  Page::renderTop();
  // output hidden header for screen reader on homepage
  if($isHomepage) 
    echo "          <h1 class=\"sr-only\">Kinsey Roberts</h1>\r\n";
  foreach ($headers as $header) {
          $prevDept = false; ?>

          <h2 class="head-tenure-type"><?php echo $header->name(); ?></h2>
          <ul class="list-departments list-unstyled <?php if($header->showDuration()) echo ' duration' ?>">
<?php   foreach($header->tenures() as $tenure) { 
          if($tenure->department()->id() != $prevDept) { 
            if($prevDept) { ?>
              </ul>
              <div class="clearfix"></div>
            </li>
<?php       } ?>
            <li>
              <div class="tenure-department" itemscope itemprop="<?php echo $tenure->type()->deptProperty(); ?>" itemtype="<?php echo $tenure->type()->deptType(); ?>">
<?php     if($header->showDuration()) 
            echo "                <div class=\"department-duration\">{$tenure->department()->duration()}</div>\n"; ?>
<?php 
            echo "                <span itemscope itemprop=\"department\" itemtype=\"http://schema.org/Organization\">";
            echo "<span itemprop=\"name\">";
            echo "{$tenure->department()->name()}"; 
            if($tenure->department()->parent()) 
              echo ", {$tenure->department()->parent()}";
            echo "</span>";
            echo "</span>";
            if($tenure->department()->organization() && $tenure->department()->organization()->name() != $tenure->department()->name()) {
              echo $tenure->department()->parent() ? "\r\n                <br />\r\n" : ",\r\n";
              echo "                <span itemprop=\"name\">{$tenure->department()->organization()->name()}</span>,\r\n";
            } else {
              echo "\r\n";
            }
            if($tenure->department()->url())
              echo "                <span itemprop=\"url\" class=\"hidden\" aria-hidden=\"true\">{$tenure->department()->url()}</span>\r\n";
            echo "                <span itemscope itemprop=\"address\" itemtype=\"http://schema.org/PostalAddress\">";
            if($tenure->department()->organization()->street())
              echo "\r\n                  <span itemprop=\"streetAddress\" class=\"hidden\" aria-hidden=\"true\">{$tenure->department()->organization()->street()}</span>";
            if($tenure->department()->organization()->city())
              echo "\r\n                  <span itemprop=\"addressLocality\">{$tenure->department()->organization()->city()}</span>";
            if($tenure->department()->organization()->state())
              echo ",\r\n                  <span itemprop=\"addressRegion\">{$tenure->department()->organization()->state()}</span>";
            if($tenure->department()->organization()->zip())
              echo "\r\n                  <span itemprop=\"postalCode\" class=\"hidden\" aria-hidden=\"true\">{$tenure->department()->organization()->zip()}</span>";
            echo "\r\n                  <span itemprop=\"addressCountry\" class=\"hidden\" aria-hidden=\"true\">US</span>";
            echo "\r\n                </span>";
                ?>

              </div>            
              <ul class="list-tenures">
<?php     }
          $prevDept = $tenure->department()->id(); ?>
                <li>
                  <div class="tenure-date-block">
                    <div class="tenure-dates"><?php 
          $hasBullets = $tenure->bullets() && count($tenure->bullets());
          // hide start time if same as end or durations are disabled for the tenure type
          if($tenure->start() == $tenure->end() || !$header->showStartDate())
            echo $tenure->end();
          else
            echo "{$tenure->start()}&ndash;{$tenure->end()}"; 
                    ?></div>
                  </div>
                  <div class="tenure-title<?php if(!$hasBullets) echo ' subtle'; ?>">
<?php     $isExternal = false;
          if($tenure->showLink() || $tenure->hasUrl()) {
            $isExternal = !$tenure->showLink() && $tenure->hasUrl() && strpos($tenure->url(), ':');
            echo '                    <a href="';
            echo $tenure->url();
            if($isExternal)
              echo '" target="_blank';
            echo '" data-category="Tenures';
            if(isset($type) && $type)
              echo " - {$type->name()}";
            $external =  $isExternal ? ' (external)' : '';
            echo "\" data-action=\"Tenure Click{$external} - {$tenure->name()}\">";
          } 
          if($tenure->type()->nameProperty())
            echo '<span itemprop="'.$tenure->type()->nameProperty().'">';
          echo $tenure->name(); 
          if($tenure->category()) 
            echo " - {$tenure->category()}";
          if($tenure->type()->nameProperty())
            echo '</span>';
          if($isExternal && $tenure->hasUrl())
            echo Page::externalLinkIcon();
          else if (!$tenure->showLink() && $tenure->hasUrl() && strpos($tenure->url(), 'pdf'))
            echo Page::pdfIcon();
          if($tenure->showLink() || $tenure->hasUrl())
            echo '</a>';
?>

                  </div>
<?php     if($tenure->synopsis())
                      echo "                  <p class=\"tenure-synopsis\">{$tenure->synopsis()}</p>\n";  ?>
<?php     if($hasBullets) { ?>
                  <ul class="list-tenure-bullets">
<?php       foreach($tenure->bullets() as $bullet) { ?>
                    <li><?php echo $bullet->text(); ?></li>
<?php       } ?>
                  </ul>
<?php     } ?>
                  <div class="clearfix"></div>
                </li>
<?php     if($tenure->department() != $prevDept) { ?>
<?php     } //  ?>
<?php   } // end tenure ?>
              </ul>
            </li>
          </ul>
<?php } // end header 
  Page::renderBottom();
