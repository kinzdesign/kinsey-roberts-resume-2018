<?php # These three meta tags *must* come first in the head; any other head content must come *after* these tags ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php # Google Tag Manager with DNT honoring ?>
<script><?php echo(file_get_contents(getcwd().'\assets\js\inline.min.js')); ?></script>
<?php # Latest compiled and minified CSS ?>
<link rel="stylesheet" href="/assets/css/<?php echo Page::$cssFile; ?>.min.css?ts=<?php Config::echoBuildTime() ?>">
<?php # HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries ?>
<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<?php # Page title ?>
<title><?php 
      if(Page::$title)
        echo Page::$title . ' | ';
      echo 'Kinsey Roberts';
?></title>
<?php Page::renderPartial('layout', 'favicons'); ?>
<link rel="author" href="/humans.txt" />
<?php #output canonical URL if defined
  if(Page::$canonicalUrl)
    echo '<link rel="canonical" href="'.Config::productionHost().Page::$canonicalUrl."\"/>\r\n";
?>
