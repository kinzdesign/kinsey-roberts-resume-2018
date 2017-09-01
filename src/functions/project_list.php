<?php
  function project_list($projects) {
    if(!$projects || !is_array($projects) || !count($projects))
      return;
?>

          <hr/>
          <section>
            <h3>Projects</h3>
            <ul class="list-projects">
<?php     foreach ($projects as $project) { ?>
              <li>
                <?php 
                  echo "<a href=\"{$project->url()}\" data-category=\"Project List\" data-action=\"Project Click - {$project->name()}\">{$project->name()}</a>\n";
                if($project->synopsis())
                  echo "                <div class=\"project-synopsis\">{$project->synopsis()}</div>\n";
                ?>
              </li>
<?php     } // end foreach ?>
            </ul>
          </section>
<?php
  }