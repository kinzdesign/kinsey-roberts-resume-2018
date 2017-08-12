<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['project'];
  $project = Project::getBySlug($slug);
  if(!$project) {
    // handle 404
    Page::error(404, "We could not find a project with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // add breadcrumbs
    Page::$breadcrumbs[$project->tenure()->type()->name()] = $project->tenure()->type()->url();
    Page::$breadcrumbs[$project->tenure()->name()] = $project->tenure()->url();
    Page::$breadcrumbs[$project->name()] = $project->url();
    Page::$skills = $project->skills();
    Page::renderTop($project->name() . ' | Projects ');
?>
          <h2 class="head-tenure-type"><?php echo $project->name(); ?></h2>
          <div class="tenure-title">
            <a href="<?php echo $project->tenure()->url(); ?>"><?php 
                echo $project->tenure()->name(); 
                if($project->tenure()->category()) 
                  echo " - {$project->tenure()->category()}";
            ?></a>
          </div>
<?php   if($project->tenure()->department()->organization()) { ?>
          <span class="tenure-organization"><?php echo $project->tenure()->department()->organization()->name(); ?>,</span>
<?php   } ?>
<?php   if($project->tenure()->department()->parent()) { ?>
          <span class="tenure-parent"><?php echo $project->tenure()->department()->parent(); ?>,</span>
<?php   } ?>
          <span class="tenure-department"><?php echo $project->tenure()->department()->name(); ?></span>
<?php   // render static content if present
        if(!Page::renderPartial('projects', $slug, "          <hr/>\n", "\n"))
          // otherwise render synopsis
          if($project->synopsis())
            echo "          <hr/>\n          <p>{$project->synopsis()}</p>\n";
  } // end contents 
  Page::renderBottom();
