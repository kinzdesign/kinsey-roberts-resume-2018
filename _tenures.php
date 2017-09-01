<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
  $headers = false;
  // try to load tenure type if specified
  if(isset(Page::$params['tenure-type'])) {
    $type = TenureType::getBySlug(Page::$params['tenure-type']);
    // ensure we got a type ('tenure-type' param could actually be an employer)
    if($type) {
      $headers = array($type);
      Page::$breadcrumbs[$type->name()] = $type->url();
      Page::$title = $type->name();
    }
  }
  // if headers not loaded, get all
  if(!$headers) {
    $headers = TenureType::getAll();
    Page::$showTopnav = false;
    Page::$showBreadcrumbs = false;
    // show all skills
    Page::$skills = Skill::getAll();
    Page::$skillsHeader = 'Skills';
    Page::$offCanvasSidebar = true;
  }
  Page::renderTop();
  foreach ($headers as $header) {
          $prevDept = false; ?>
          <h2 class="head-tenure-type"><?php echo $header->name(); ?></h2>
          <ul class="list-departments">
<?php   foreach($header->tenures() as $tenure) { 
          if($tenure->department()->id() != $prevDept) { 
            if($prevDept) { ?>
              </ul>
              <div class="clearfix"></div>
            </li>
<?php       } ?>
            <li>
              <div class="tenure-department">
<?php     if($header->showDuration()) 
            echo "                <div class=\"department-duration\">{$tenure->department()->duration()}</div>\n"; ?>
                <?php 
            echo $tenure->department()->name(); 
            if($tenure->department()->parent()) 
              echo ", {$tenure->department()->parent()}";
            if($tenure->department()->organization() && $tenure->department()->organization()->name() != $tenure->department()->name()) {
              echo $tenure->department()->parent() ? "<br />\n                " : ', ';
              echo $tenure->department()->organization()->name();
            }
            if($tenure->department()->organization()->city())
              echo ", {$tenure->department()->organization()->city()}";
            if($tenure->department()->organization()->state())
              echo ", {$tenure->department()->organization()->state()}";
                ?>

              </div>            
              <ul class="list-tenures">
<?php     }
          $prevDept = $tenure->department()->id(); ?>
                <li>
                  <div class="tenure-date-block">
                    <div class="tenure-dates"><?php 
          $hasBullets = $tenure->bullets() && count($tenure->bullets());
          if($tenure->start() == $tenure->end())
            echo $tenure->end();
          else
            echo "{$tenure->start()}&ndash;{$tenure->end()}"; 
                    ?></div>
                  </div>
                  <div class="tenure-title<?php if(!$hasBullets) echo ' subtle'; ?>">
<?php     if($tenure->showLink() || $tenure->hasUrl()) {
            echo '                    <a href="';
            echo $tenure->url();
            if($tenure->hasUrl())
              echo '" target="_blank';
            echo '" data-category="Tenures';
            if(isset($type) && $type)
              echo " - {$type->name()}";
            $external = $tenure->hasUrl() ? ' (external)' : '';
            echo "\" data-action=\"Tenure Click{$external} - {$tenure->name()}\">";
          } 
          echo $tenure->name(); 
          if($tenure->category()) 
            echo " - {$tenure->category()}";
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