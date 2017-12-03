<?php
  function tenure_list($tenures) {
    if(!$tenures || !is_array($tenures) || !count($tenures))
      return;
?>

          <hr/>
          <section>
            <h2>Positions</h2>
            <ul class="list-tenures">
<?php     foreach ($tenures as $tenure) { ?>
              <li>
                <?php 
                  echo "<a href=\"{$tenure->url()}\" data-category=\"Tenure List\" data-action=\"Tenure Click - {$tenure->name()}\">{$tenure->name()}";
                if($tenure->category()) 
                  echo " - {$tenure->category()}";
                echo "</a><br/>\r\n";
                echo "                {$tenure->department()->name()}"; 
                if($tenure->department()->parent()) 
                  echo ", {$tenure->department()->parent()}";
                if($tenure->department()->organization() && $tenure->department()->organization()->name() != $tenure->department()->name()) {
                  echo $tenure->department()->parent() ? "<br />\r\n                " : ", ";
                  echo "{$tenure->department()->organization()->name()}";
                }
                if($tenure->department()->organization()->city())
                  echo ", {$tenure->department()->organization()->city()}";
                if($tenure->department()->organization()->state())
                  echo ", {$tenure->department()->organization()->state()}";
                if($tenure->synopsis())
                  echo "                <div class=\"tenure-synopsis\">{$tenure->synopsis()}</div>\n";
                ?>
              </li>
<?php     } // end foreach ?>
            </ul>
          </section>
<?php
  }