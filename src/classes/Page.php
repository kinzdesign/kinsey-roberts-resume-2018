<?php
class Page {

  private static $scripts = array();

  public static $breadcrumbs = array('Home' => '/');
  public static $title;
  public static $cssFile = 'resume';
  public static $skills = false;
  public static $showBreadcrumbs = true;
  public static $showSidebar = true;
  public static $showTopnav = true;
  public static $params = array();

  public static function isStatic() {
    return isset($_GET['static']);
  }

  public static function cacheBreaker($force = false) {
    return ($force || self::isStatic()) ? ('?ts=' . Config::getBuildTime()) : '';
  }

  public static function error($status_code, $message, $title = "Error") { 
    http_response_code($status_code);
    self::renderTop("{$title}!");
    echo "          <div class=\"alert alert-danger\">{$message}</div>\n";
    self::renderBottom();
    exit();
  }

  public static function renderTop($title = false) {
    if($title)
      self::$title = $title;
    self::renderPartial('layout', 'top');
  }

  public static function renderBottom() {
    self::renderPartial('layout', 'bottom');
  }

  public static function renderPartial($dir, $name, $prefix = false, $suffix = false) {
    // compute path
    $path = "{$_SERVER['DOCUMENT_ROOT']}/src/partials/{$dir}/_{$name}.php";
    // ensure exists
    if(!file_exists($path))
      return false;
    // output prefix if defined
    if($prefix)
      echo $prefix;
    // include the partial
    require_once($path);
    // output suffix if defined
    if($suffix)
      echo $suffix;
    return true;
  }

  // returns whether or not the script was already registered
  public static function registerScript($script) {
    if(in_array($script, self::$scripts))
      return true;
    self::$scripts[] = $script;
    return false;
  }

  public static function registerGoogleCharts() {
    return self::registerScript('https://www.gstatic.com/charts/loader.js');
  }

  public static function registerChart($chart) {
    Page::registerScript("/assets/charts/{$chart}.js" . self::cacheBreaker(true));
  }

  public static function renderScripts() {
    foreach (self::$scripts as $script) {
      echo "    <script src=\"{$script}\"></script>\n";
    }
  }

  // interpoltes links of the form {noun|sulg} or {noun:slug}
  // e.g. {project|mailroom}  or {tenure:application-developer}
  public static function interpolateLinks($s) {
    return preg_replace_callback("/\{([^\}\|:]+)[\|:]([^\}\|:]+)\}/", function ($matches) {
      // make sure we got matches
      if($matches && count($matches) > 2) {
        // switch on  noun
        switch ($matches[1]) {
          // return project link
          case 'project':
            $project = Project::getBySlug($matches[2]);
            if($project)
              return $project->url() . "\" data-category=\"Interpolated Link\" data-action=\"Project Click - {$project->name()}";
            break;
          // return skill link
          case 'skill':
            $skill = Skill::getBySlug($matches[2]);
            if($skill)
              return $skill->url() . "\" data-category=\"Interpolated Link\" data-action=\"Skill Click - {$skill->name()}";
            break;
          // return tenure link
          case 'tenure':
            $tenure = Tenure::getBySlug($matches[2]);
            if($tenure)
              return $tenure->url() . "\" data-category=\"Interpolated Link\" data-action=\"Tenure Click - {$tenure->name()}";
            break;
          // return asset link
          case 'asset':
            return '/assets/' . $matches[2] . self::cacheBreaker(). "\" data-category=\"Interpolated Link\" data-action=\"Asset Click - {$matches[2]}";
          // return pdf link
          case 'pdf':
            return '/pdf/' . $matches[2] . '/' . self::cacheBreaker() . "\" data-category=\"Interpolated Link\" data-action=\"PDF Click - {$matches[2]}";
        }
      }
      // if not handled, return raw text
      return $matches[0];
    }, $s);
  }
}
