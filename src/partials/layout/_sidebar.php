<?php
  $hadSkills = true;
  if(!Page::$skills || !is_array(Page::$skills) || count(Page::$skills) < 1) {
    Page::$skills = Skill::getAll();
    $hadSkills = false;
  }
  $prevType = -1;
?>
          <aside class="sidebar">
            <h2>Skills<?php if(!Page::$isHomepage) echo ' Used'; ?></h2>
            <div class="panel-group" role="tablist" aria-multiselectable="true">
<?php
  foreach (Page::$skills as $skill) {
    if($skill->typeId() != $prevType) {
      // close previous panel
      if($prevType > 0) { ?>
                  </ul>
                </div>
              </div>
<?php 
      } // end close previous panel 
      // open current panel ?>
              <div class="panel-heading" role="tab" id="head-skill-type<?php echo $skill->typeId(); ?>">
                <div class="panel-title">
                  <a role="button" data-toggle="collapse" href="#collapse-skill-type<?php echo $skill->typeId(); ?>" aria-expanded="true" aria-controls="collapse-skill-type<?php echo $skill->typeId(); ?>"<?php if(Page::$isHomepage && !$skill->type()->expanded()) echo ' class="collapsed"'; ?> data-category="Skill List" data-action="Category Toggle - <?php echo $skill->type()->name() ?>" aria-label="Expand/Collapse: <?php echo $skill->type()->name(); ?>" title="Expand/Collapse: <?php echo $skill->type()->name(); ?>">
                    <i class="fa fa-fw fa-chevron-up-down"></i>
                    <?php echo $skill->type()->name(); ?>
                  </a>
                </div>
              </div>
              <div id="collapse-skill-type<?php echo $skill->typeId(); ?>" class="panel-collapse collapse <?php if(!Page::$isHomepage || $skill->type()->expanded()) echo 'in'; ?>" role="tabpanel" aria-labelledby="head-skill-type<?php echo $skill->typeId(); ?>">
                <div class="panel-body">
                  <ul>
<?php 
    } // end header 

    // output skill with link if projects exist
    if($skill->hasProjects())
      echo "                    <li><a href=\"{$skill->url()}\" data-category=\"Skills List\" data-action=\"Skill Click - {$skill->name()}\">{$skill->name()}</a></li>\r\n";
    else
      echo "                    <li>{$skill->name()}</li>\r\n";

  $prevType = $skill->typeId();
  } // end skill 
  // close out panel and accordian ?>
                  </ul>
                </div>
              </div>
            </div>
          </aside>
