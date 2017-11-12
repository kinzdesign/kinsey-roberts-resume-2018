<?php
  function isActive($href) {
    // see if this tab is active on current page
    return (0 === strpos($_SERVER["SCRIPT_NAME"], $href));
  }

  // outputs a simple link to the navbar
  function navbarSimpleLink($href, $text, $shortText = false) {
    // see if tab is active
    $active = isActive($href);
    // build class and accessible strings
    $class = $active ? ' class="active"' : '';
    $accessible = $active ? ' <span class="sr-only">(current)</span>' : '';
    // echo markup
    echo "            <li{$class}><a href=\"$href\" data-category=\"Topnav\" data-action=\"Click - {$text}\">";
    if($shortText)
      echo 
        "<span class=\"navbar-short-text\" aria-hidden=\"true\">$shortText</span>" .
        "<span class=\"navbar-full-text\" aria-hidden=\"false\">$text</span>";
    else
      echo $text;
    echo "</a></li>\r\n";
  }
?>
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
<?php # Print-only email address ?>
      <span class="print-only-email" aria-hidden="true">kinsey.q.roberts@gmail.com</span>
<?php # Brand and toggle get grouped for better mobile display ?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/<?php echo Page::cacheBreaker(); ?>" data-category="Topnav" data-action="Click - Home">
            <span itemprop="honorificPrefix" class="hidden">Mx.</span>
            <span itemprop="name">
              <span itemprop="givenName">Kinsey</span>
              <span itemprop="familyName">Roberts</span>
            </span>
            <span itemprop="gender" class="hidden">they/them/their pronouns</span>
            <span itemprop="url" class="hidden"><?php echo Config::productionHost(); ?></span>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
<?php if(Page::$showTopnav) { ?>
          <ul class="nav navbar-nav">
<?php   // add skills and projects
        navbarSimpleLink('/projects/' . Page::cacheBreaker(), 'Projects');
        navbarSimpleLink('/skills/' . Page::cacheBreaker(), 'Skills');
        foreach(TenureType::getAll() as $header) { 
          if($header->showInNav()) {
            navbarSimpleLink($header->url(), $header->name(), $header->shortName()); ?>
<?php     }
        } // end header
 ?>
          </ul>
<?php } ?>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="https://www.linkedin.com/in/kinsey-roberts-66166512" target="_blank" rel="noopener" rel="noopener noreferrer" data-category="Contact" data-action="Topnav - LinkedIn" title="LinkedIn Profile" itemprop="sameAs">
                <i class="fa fa-lg fa-fw fa-linkedin hidden-xs" aria-hidden="true"></i>
                <span class="visible-xs-inline visible-sm-inline">LinkedIn Profile</span>
              </a>
            </li>
            <li>
              <a href="mailto:kinsey.q.roberts@gmail.com" data-category="Contact" data-action="Topnav - Email" title="Email kinsey.q.roberts@gmail.com">
                <i class="fa fa-lg fa-fw fa-envelope-o hidden-xs" aria-hidden="true"></i>
                <span class="sr-only">Email </span><span class="visible-xs-inline visible-sm-inline" itemprop="email">kinsey.q.roberts@gmail.com</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
