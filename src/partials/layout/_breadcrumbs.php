          <ol class="breadcrumb">
<?php 
  foreach(Page::$breadcrumbs as $name => $url)
    echo "            <li><a href=\"$url\" data-category=\"Breadcrumb\" data-action=\"Click - {$name}\">$name</a></li>\n";
?>
          </ol>
