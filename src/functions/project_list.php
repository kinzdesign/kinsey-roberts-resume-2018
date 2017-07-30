<?php
  function project_list($projects) {
    if(!$projects || !is_array($projects) || !count($projects))
      return;
?>
          <section>
            <hr/>
            <h3>Projects</h3>
            <ul class="list-projects">
<?php     foreach ($projects as $project) { ?>
              <li>
                <?php 
                  echo "<a href=\"{$project->url()}\">{$project->title()}</a>\n";
                if($project->synopsis())
                  echo "                <div class=\"project-synopsis\">{$project->synopsis()}</div>\n";
                ?>
              </li>
<?php     } // end foreach ?>
            </ul>
          </section>
<?php
  }