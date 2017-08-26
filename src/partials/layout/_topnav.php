<?php
  function isActive($href) {
    // see if this tab is active on current page
    return (0 === strpos($_SERVER["SCRIPT_NAME"], $href));
  }

  function navbarBeginDropdown($href, $text) {
    // see if tab is active
    $active = isActive($href);
    // build class and accessible strings
    $class = $active ? 'active dropdown' : 'dropdown';
    $accessible = $active ? ' <span class="sr-only">(current)</span>' : '';

    // open list item
    echo "            <li class=\"{$class}\">\r\n              <a href=\"$href\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\" data-category=\"Topnav\" data-action=\"Dropdown Click - {$text}\">{$text}{$accessible}</a>\r\n";
  }

  // outputs a simple link to the navbar
  function navbarSimpleLink($href, $text) {
    // see if tab is active
    $active = isActive($href);
    // build class and accessible strings
    $class = $active ? ' class="active"' : '';
    $accessible = $active ? ' <span class="sr-only">(current)</span>' : '';
    // echo markup
    echo "<li{$class}><a href=\"$href\" data-category=\"Topnav\" data-action=\"Click - {$text}\">$text</a></li>\r\n";
  }
?>
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
<?php # Brand and toggle get grouped for better mobile display ?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/" data-category="Topnav" data-action="Click - Home">Kinsey Roberts</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
<?php if(Page::$showTopnav) { ?>
          <ul class="nav navbar-nav">
<?php   foreach(TenureType::getAll() as $header) { 
          if($header->showInNav()) {
            navbarBeginDropdown($header->url(), $header->name()); ?>
              <ul class="dropdown-menu">
<?php       foreach($header->tenures() as $tenure) {
              if($tenure->showInNav()) { ?>
                <li><a href="<?php echo $tenure->url(); ?>" data-category="Topnav" data-action="Tenure Click - <?php echo $tenure->name(); ?>"><?php 
                  echo $tenure->name(); 
                  if($tenure->category()) 
                    echo " - {$tenure->category()}";
                ?></a></li>
<?php         }
            } // end tenure ?>
              </ul>
            </li>
<?php     }
        } // end header ?>
          </ul>
<?php } ?>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="mailto:kinsey.q.roberts@gmail.com" data-category="Contact" data-action="Topnav - Email">
                <i class="fa fa-envelope-o" title="Email"></i>
                kinsey.q.roberts@gmail.com
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
