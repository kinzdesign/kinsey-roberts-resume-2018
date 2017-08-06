          <ol class="breadcrumb">
<?php 
  foreach(Page::$breadcrumbs as $name => $url) { 
    if($_SERVER['REQUEST_URI'] == $url) 
      echo "            <li class=\"active\">$name</li>\n";
    else
      echo "            <li><a href=\"$url\">$name</a></li>\n";
  } ?>
          </ol>
