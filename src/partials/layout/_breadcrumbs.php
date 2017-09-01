          <ol class="breadcrumb">
<?php 
  foreach(Page::$breadcrumbs as $name => $url)
    if($name == 'Home')
      echo "            <li><a href=\"$url\" data-category=\"Breadcrumb\" data-action=\"Click - Home\" title=\"Home\"><i class=\"fa fa-lg fa-fw fa-home\" title=\"Home\"></i></a></li>\n";
    else
      echo "            <li><a href=\"$url\" data-category=\"Breadcrumb\" data-action=\"Click - {$name}\">$name</a></li>\n";
?>
          </ol>
