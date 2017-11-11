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
<?php   foreach($header->skills() as $skill) { ?>
            <li><?php echo "<a href=\"{$skill->url()}\" data-category=\"Skills List". (isset($type) ? " - {$type->name()}" : '') . "\" data-action=\"Skill Click - {$skill->name()}\">{$skill->name()}</a>"; ?></li>
<?php   } // end skill ?>
          </ul>
<?php } // end header 

  Page::renderBottom();
