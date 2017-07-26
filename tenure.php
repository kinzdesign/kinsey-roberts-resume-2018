<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_top.php'); ?>
<?php
      $slug = $_GET['slug'];
      $tenure = Tenure::getBySlug($slug);
      if(!$tenure) {
        // TODO: 404
      } else { // output contents ?>
          <h2 class="head-tenure"><?php 
            echo $tenure->title(); 
            if($tenure->category()) 
              echo " - {$tenure->category()}";
          ?></h2>
          <div class="tenure-date-block">
            <div class="tenure-duration"><?php echo $tenure->duration(); ?></div>
            <div class="tenure-dates"><?php echo $tenure->start(); ?>&ndash;<?php echo $tenure->end(); ?></div>
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
          <div class="clearfix"></div>
          <hr />
<?php   $partialPath = $_SERVER['DOCUMENT_ROOT'] . "/src/partials/tenures/_$slug.php";
        if(file_exists($partialPath)) 
          require($partialPath); ?>          
<?php } // end contents ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_bottom.php'); ?>