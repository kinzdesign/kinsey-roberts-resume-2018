          <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
<?php 
  $i = 0;
  foreach(Page::$breadcrumbs as $name => $url) {
    $i++;
    echo "            <li itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">\r\n";
    echo "              <meta itemprop=\"position\" content=\"{$i}\" />\r\n";
    echo "              <a href=\"$url\" data-category=\"Breadcrumb\" data-action=\"Click - {$name}\" itemscope itemtype=\"http://schema.org/Thing\" itemprop=\"item\">\r\n";
    if($name == 'Home') {
      echo "                <i class=\"fa fa-lg fa-fw fa-home\" aria-hidden=\"true\"></i>\r\n";
      echo "                <span itemprop=\"name\" class=\"hidden\">$name</span>\r\n";
    } else {
      echo "                <span itemprop=\"name\">$name</span>\r\n";
    }
    echo "              </a>\r\n";
    echo "            </li>\r\n";
  }
?>
          </ol>
