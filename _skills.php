<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
  Page::$showSidebar = false;
  Page::$breadcrumbs['Skills'] = '/skills/';
  if(isset(Page::$params['skill-type'])) {
    $type = SkillType::getBySlug(Page::$params['skill-type']);
    $headers = array($type);
    Page::$title = $type->name() . ' | Skills';
    Page::$breadcrumbs[$type->name()] = $type->url();
  } else {
    $headers = SkillType::getAll();
    Page::$title = 'Skills';
  }
  Page::renderTop();
  foreach ($headers as $header) { ?>
          <h2 class="head-skill-type"><?php echo $header->name(); ?></h2>
          <ul class="list-skills">
<?php   foreach($header->skills() as $skill) { ?>
            <li><?php echo "<a href=\"{$skill->url()}\">{$skill->name()}</a>"; ?></li>
<?php   } // end skill ?>
          </ul>
<?php } // end header 

  Page::renderBottom();
