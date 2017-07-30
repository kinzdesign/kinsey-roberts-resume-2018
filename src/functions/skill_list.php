<?php
  function skill_list($skills) {
    if(!$skills || !is_array($skills) || !count($skills))
      return;
?>

          <hr/>
          <section>
            <h3>Skills</h3>
            <ul class="list-skills">
<?php     foreach ($skills as $skill) { ?>
              <li>
                <?php 
                  echo "<a href=\"{$skill->url()}\">{$skill->name()}</a>\n";
                ?>
              </li>
<?php     } // end foreach ?>
            </ul>
          </section>
<?php
  }