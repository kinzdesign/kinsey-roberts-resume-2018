<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['skill'];
  $skill = Skill::getBySlug($slug);
  Page::$showSidebar = false;
  if(!$skill) {
    // handle 404
    Page::error(404, "We could not find a skill with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // add breadcrumbs
    Page::$breadcrumbs['Skills'] = '/skills/';
    Page::$breadcrumbs[$skill->type()->name()] = $skill->type()->url();
    Page::$breadcrumbs[$skill->name()] = $skill->url();
    // build title
    Page::renderTop("{$skill->name()} | {$skill->type()->name()} | Skills");
?>
          <h2 class="head-skill"><?php echo $skill->name(); ?></h2>
<?php   // render static content if present
        if(!Page::renderPartial('skills', $slug))
          // otherwise output synopsis if present
          if($skill->synopsis())
            echo "<p>{$skill->synopsis()}</p>\n";
        // render project list
        project_list($skill->projects());
  } // end contents 
  Page::renderBottom();
