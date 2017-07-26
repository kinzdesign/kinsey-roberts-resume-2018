<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_top.php'); ?>
          <!-- <pre> -->
<?php
      $headers = TenureType::getAll();
      foreach ($headers as $header) { ?>
          <h2 class="head-tenure-type"><?php echo $header->name(); ?></h2>
          <ul class="list-tenures">
<?php   foreach($header->getTenures() as $tenure) { ?>
            <li class="clearfix">
              <div class="tenure-date-block">
                <div class="tenure-duration"><?php echo $tenure->duration(); ?></div>
                <div class="tenure-dates"><?php echo $tenure->start(); ?>&ndash;<?php echo $tenure->end(); ?></div>
              </div>
              <div class="tenure-title">
                <?php 
                  echo $tenure->title(); 
                  if($tenure->category()) 
                    echo " - {$tenure->category()}";
                  if($tenure->notes())
                    echo " <span class=\"tenure-notes\">({$tenure->notes()})</span>"; 
                  echo "\n";
                ?>
              </div>
              <a href="<?php echo $tenure->department()->url(); ?>" target="_blank">
<?php     if($tenure->department()->organization()) { ?>
                <span class="tenure-organization"><?php echo $tenure->department()->organization()->name(); ?>,</span>
<?php     } ?>
<?php     if($tenure->department()->parent()) { ?>
                <span class="tenure-parent"><?php echo $tenure->department()->parent(); ?>,</span>
<?php     } ?>
                <span class="tenure-department"><?php echo $tenure->department()->name(); ?></span>
              </a>
              <ul class="list-tenure-bullets">
<?php     foreach($tenure->bullets() as $bullet) { ?>
                <li><?php echo $bullet->text(); ?></li>
<?php     } ?>
              </ul>
            </li>
<?php   } // end tenure ?>
          </ul>
<?php } // end header ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_bottom.php'); ?>