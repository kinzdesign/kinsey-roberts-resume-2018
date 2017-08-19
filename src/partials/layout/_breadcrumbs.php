          <ol class="breadcrumb">
<?php 
  foreach(Page::$breadcrumbs as $name => $url) { 
    if($_SERVER['REQUEST_URI'] == $url) 
      echo "            <li class=\"active\">$name</li>\n";
    else
      echo "            <li><a href=\"$url\" data-category=\"Breadcrumb\" data-action=\"Click - {$name}\">$name</a></li>\n";
  } ?>
          </ol>
