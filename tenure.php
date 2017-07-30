<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = $_GET['slug'];
  $tenure = Tenure::getBySlug($slug);
  if(!$tenure) {
    // handle 404
    Page::error(404, "We could not find a tenure with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // build title
    $fullTitle = $tenure->title();
    if($tenure->category()) 
      $fullTitle = "$fullTitle - {$tenure->category()}";
    Page::renderTop("$fullTitle | {$tenure->type()->name()}");
?>
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
          require($partialPath); 
        $projects = $tenure->projects();
        if($projects && is_array($projects) && count($projects)) { ?>

          <section>
            <hr/>
            <h3>Projects</h3>
            <ul class="list-projects">
<?php     foreach ($projects as $project) { ?>
              <li>
                <?php 
                  echo "<a href=\"{$project->url()}\">{$project->title()}</a>\n";
                if($project->synopsis())
                  echo "                <div class=\"project-synopsis\">{$project->synopsis()}</div>\n";
                ?>
              </li>
<?php     } ?>
            </ul>
          </section>
<?php   } // end projects
  } // end contents 
  Page::renderBottom();
