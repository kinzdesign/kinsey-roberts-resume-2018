<?php
  $hadSkills = true;
  if(!Page::$skills || !is_array(Page::$skills) || count(Page::$skills) < 1) {
    Page::$skills = Skill::getAll();
    $hadSkills = false;
  }
  $prevType = -1;
?>
          <aside class="sidebar">
            <h3><?php echo Page::$skillsHeader; ?></h3>
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
                  <a role="button" data-toggle="collapse" href="#collapse-skill-type<?php echo $skill->typeId(); ?>" aria-expanded="true" aria-controls="collapse-skill-type<?php echo $skill->typeId(); ?>"<?php if(!$hadSkills && !$skill->type()->expanded()) echo ' class="collapsed"'; ?> data-category="Skill List" data-action="Category Toggle - <?php echo $skill->type()->name() ?>">
                    <i class="fa fa-fw fa-chevron-down-right" title="Expand/Collapse Section"></i><?php 
                    echo $skill->type()->name(); ?>

                  </a>
                </div>
              </div>
              <div id="collapse-skill-type<?php echo $skill->typeId(); ?>" class="panel-collapse collapse <?php if($hadSkills || $skill->type()->expanded()) echo 'in'; ?>" role="tabpanel" aria-labelledby="head-skill-type<?php echo $skill->typeId(); ?>">
                <div class="panel-body">
                  <ul>
<?php 
    } // end header ?>
                    <li><a href="<?php echo $skill->url() ?>" data-category="Skills List" data-action="Skill Click - <?php echo $skill->name(); ?>"><?php echo $skill->name(); ?></a></li>
<?php
  $prevType = $skill->typeId();
  } // end skill 
  // close out panel and accordian?>
                  </ul>
                </div>
              </div>
            </div>
          </aside>