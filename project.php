<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = $_GET['slug'];
  $project = Project::getBySlug($slug);
  if(!$project) {
    // handle 404
    Page::error(404, "We could not find a project with slug '{$slug}'.", "Not Found");
  } else { // output contents
    Page::$skills = $project->skills();
    Page::renderTop($project->title() . ' | Projects ');
?>
          <h2 class="head-tenure-type"><?php echo $project->title(); ?></h2>
          <div class="tenure-title">
            <a href="<?php echo $project->tenure()->url(); ?>"><?php 
                echo $project->tenure()->title(); 
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
<?php   $partialPath = $_SERVER['DOCUMENT_ROOT'] . "/src/partials/projects/_$slug.php";
        if(file_exists($partialPath)) {
          echo "          <hr/>\n";
          require($partialPath); 
          echo "\n";
        }
  } // end contents 
  Page::renderBottom();
