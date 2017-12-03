<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['skill'];
  $skill = Skill::getBySlug($slug);
  if(!$skill) {
    // handle 404
    Page::error(404, "We could not find a skill with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // add breadcrumbs
    Skill::queueSkillsBreadcrumb();
    $skill->type()->queueBreadcrumb();
    $skill->queueBreadcrumb();
    Page::$canonicalUrl = $skill->canonicalUrl();
    // build title
    Page::renderTop("{$skill->name()} | {$skill->type()->name()} | Skills");
?>
          <h1 class="head-skill"><?php echo $skill->name(); ?></h1>
<?php   // render static content if present
        if(!Page::renderPartial('skills', $slug))
          // otherwise output synopsis if present
          if($skill->synopsis())
            echo "<p>{$skill->synopsis()}</p>\n";
        // render tenure list
        tenure_list($skill->tenures());
        // render project list
        project_list($skill->projects());
  } // end contents 
  Page::renderBottom();
