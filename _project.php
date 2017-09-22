<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['project'];
  $project = Project::getBySlug($slug);
  if(!$project) {
    // handle 404
    Page::error(404, "We could not find a project with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // add breadcrumbs
    $project->tenure()->type()->queueBreadcrumb();
    $project->tenure()->queueBreadcrumb();
    $project->queueBreadcrumb();
    Page::$skills = $project->skills();
    Page::renderTop($project->name() . ' | Projects ');
?>
          <h2 class="head-tenure-type"><?php echo $project->name(); ?></h2>
          <div class="tenure-title">
            <a href="<?php echo $project->tenure()->url(); ?>" data-category="Project - <?php echo $project->name(); ?>" data-action="Tenure Click - <?php echo $project->tenure()->name(); ?>">
              <span itemprop="<?php echo $project->tenure()->type()->nameProperty(); ?>">
                <?php 
                echo $project->tenure()->name(); 
                if($project->tenure()->category()) 
                  echo " - {$project->tenure()->category()}"; ?>

              </span>
            </a>
          </div>
<?php     echo "          <span itemscope itemprop=\"{$project->tenure()->type()->deptProperty()}\" itemType=\"{$project->tenure()->type()->deptType()}\">\r\n";
          if($project->tenure()->department()->url()) {
            echo "            <a href=\"{$project->tenure()->department()->url()}\" target=\"_blank\" data-category=\"Tenure - {$project->tenure()->name()}\" data-action=\"Department Click - {$project->tenure()->department()->name()}\">\r\n";
          }
          if($project->tenure()->department()->organization()) { ?>
              <span class="tenure-organization" itemprop="name"><?php echo $project->tenure()->department()->organization()->name(); ?></span>,
<?php     } ?>
              <span itemscope itemprop="department" itemtype="http://schema.org/Organization">
<?php     
          echo "                <span itemprop=\"name\">\r\n";
          if($project->tenure()->department()->parent()) { ?>
                  <span class="tenure-parent"><?php echo $project->tenure()->department()->parent(); ?>,</span>
<?php     } ?>
<?php
          
          echo "                  <span class=\"tenure-department\">{$project->tenure()->department()->name()}</span>\r\n";
          echo "                </span>\r\n";
          if($project->tenure()->department()->url())
            echo "                <span itemprop=\"url\" class=\"hidden\" aria-hidden=\"true\">{$project->tenure()->department()->url()}</span>\r\n";
          echo "              </span>\r\n";
          if($project->tenure()->department()->url()) 
            echo "              ".Page::externalLinkIcon()."\r\n            </a>\r\n"; 
          echo "            <span itemscope itemprop=\"address\" itemtype=\"http://schema.org/PostalAddress\" class=\"hidden\" aria-hidden=\"true\">\r\n";
          if($project->tenure()->department()->organization()->street())
            echo "              <span itemprop=\"streetAddress\">{$project->tenure()->department()->organization()->street()}</span>\r\n";
          if($project->tenure()->department()->organization()->city())
            echo "              <span itemprop=\"addressLocality\">{$project->tenure()->department()->organization()->city()}</span>\r\n";
          if($project->tenure()->department()->organization()->state())
            echo "              <span itemprop=\"addressRegion\">{$project->tenure()->department()->organization()->state()}</span>\r\n";
          if($project->tenure()->department()->organization()->zip())
            echo "              <span itemprop=\"postalCode\">{$project->tenure()->department()->organization()->zip()}</span>\r\n";
          echo "              <span itemprop=\"addressCountry\">US</span>\r\n"; 
          echo "            </span>\r\n"; 
          echo "          </span>\r\n"; 
          // render static content if present
          if(!Page::renderPartial('projects', $slug, "          <hr/>\r\n", "\r\n"))
            // otherwise render synopsis
            if($project->synopsis())
              echo "          <hr/>\n          <p>{$project->synopsis()}</p>\n";
  } // end contents 
  Page::renderBottom();
