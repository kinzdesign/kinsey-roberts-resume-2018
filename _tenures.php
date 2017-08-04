<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
  if(isset(Page::$params['tenure-type'])) {
    $type = TenureType::getBySlug(Page::$params['tenure-type']);
    $headers = array($type);
    Page::$title = $type->name();
  } else {
    $headers = TenureType::getAll();
    Page::$showTopnav = false;
  }
  Page::renderTop();
  foreach ($headers as $header) { ?>
          <h2 class="head-tenure-type"><?php echo $header->name(); ?></h2>
          <ul class="list-tenures">
<?php   foreach($header->tenures() as $tenure) { ?>
            <li class="clearfix">
              <div class="tenure-date-block">
                <div class="tenure-duration"><?php echo $tenure->duration(); ?></div>
                <div class="tenure-dates"><?php echo $tenure->start(); ?>&ndash;<?php echo $tenure->end(); ?></div>
              </div>
              <div class="tenure-title">
                <a href="<?php echo $tenure->url(); ?>">
                  <?php 
                    echo $tenure->title(); 
                    if($tenure->category()) 
                      echo " - {$tenure->category()}";
                    if($tenure->notes())
                      echo " <span class=\"tenure-notes\">({$tenure->notes()})</span>"; 
                    echo "\n";
                  ?>
                </a>
              </div>
<?php     if($tenure->department()->organization()) { ?>
              <span class="tenure-organization"><?php echo $tenure->department()->organization()->name(); ?>,</span>
<?php     } ?>
<?php     if($tenure->department()->parent()) { ?>
              <span class="tenure-parent"><?php echo $tenure->department()->parent(); ?>,</span>
<?php     } ?>
              <span class="tenure-department"><?php echo $tenure->department()->name(); ?></span>
              <ul class="list-tenure-bullets">
<?php     foreach($tenure->bullets() as $bullet) { ?>
                <li><?php echo $bullet->text(); ?></li>
<?php     } ?>
              </ul>
            </li>
<?php   } // end tenure ?>
          </ul>
<?php } // end header 
  Page::renderBottom();
