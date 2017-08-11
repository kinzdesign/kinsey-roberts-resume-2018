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
    echo "<li class=\"{$class}\">\r\n              <a href=\"$href\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">{$text}{$accessible}</a>\r\n";
  }

  // outputs a simple link to the navbar
  function navbarSimpleLink($href, $text) {
    // see if tab is active
    $active = isActive($href);
    // build class and accessible strings
    $class = $active ? ' class="active"' : '';
    $accessible = $active ? ' <span class="sr-only">(current)</span>' : '';
    // echo markup
    echo "<li{$class}><a href=\"$href\">$text</a></li>\r\n";
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
          <a class="navbar-brand" href="/">Kinsey Roberts</a>
        </div>
<?php if(Page::$showTopnav) { ?>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
<?php   foreach(TenureType::getAll() as $header) { 
          if($header->showInNav()) {
            navbarBeginDropdown($header->url(), $header->name()); ?>
              <ul class="dropdown-menu">
<?php       foreach($header->tenures() as $tenure) {
              if($tenure->showInNav()) { ?>
                <li><a href="<?php echo $tenure->url(); ?>"><?php 
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
        </div>
      </div>
    </nav>
