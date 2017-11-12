<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
  Skill::queueSkillsBreadcrumb();
  if(isset(Page::$params['skill-type'])) {
    $type = SkillType::getBySlug(Page::$params['skill-type']);
    $headers = array($type);
    Page::$title = $type->name() . ' | Skills';
    $type->queueBreadcrumb();
    Page::$canonicalUrl = $type->canonicalUrl();
  } else {
    $headers = SkillType::getAll();
    Page::$title = 'Skills';
    Page::$canonicalUrl = '/skills/';
  }
  Page::renderTop();
  foreach ($headers as $header) { ?>
          <h1 class="head-skill-type"><?php echo $header->name(); ?></h1>
          <ul class="list-skills">
<?php   foreach($header->skills() as $skill) {
    // output skill with link if projects exist
    if($skill->hasProjects())
      echo "                    <li><a href=\"{$skill->url()}\" data-category=\"Skills Page". (isset($type) ? " - {$type->name()}" : '') . "\" data-action=\"Skill Click - {$skill->name()}\">{$skill->name()}</a></li>\r\n";
    else
      echo "                    <li>{$skill->name()}</li>\r\n";
        } // end skill ?>
          </ul>
<?php } // end header 

  Page::renderBottom();
