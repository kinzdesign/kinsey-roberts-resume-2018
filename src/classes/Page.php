<?php
class Page {

  public static $title;

  public static function isStatic() {
    return isset($_GET['static']);
  }

  public static function cacheBreaker() {
    return self::isStatic() ? ('?ts=' . Config::getBuildTime()) : '';
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
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_top.php');
  }

  public static function renderBottom() {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_bottom.php');
  }
}
