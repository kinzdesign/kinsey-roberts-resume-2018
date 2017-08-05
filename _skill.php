<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['skill'];
  $skill = Skill::getBySlug($slug);
  Page::$showSidebar = false;
  if(!$skill) {
    // handle 404
    Page::error(404, "We could not find a skill with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // build title
    Page::renderTop("{$skill->name()} | {$skill->type()->name()} | Skills");
?>
          <h2 class="head-skill"><?php echo $skill->name(); ?></h2>
<?php   // render static content
        Page::renderPartial('skills', $slug);
        // render project list
        require_once($_SERVER['DOCUMENT_ROOT'] . '/src/functions/project_list.php');
        project_list($skill->projects());
  } // end contents 
  Page::renderBottom();
