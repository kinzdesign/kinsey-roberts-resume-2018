<?php
class Config {

  // timestamp of last build
  public static function getBuildTime() { return '1519148973'; }
  public static function getBuildTimeW3C() { return date('c', self::getBuildTime()); }
  public static function echoBuildTime() { echo self::getBuildTime(); }

  // get database configuration variables
  public static function dbHost() { return getenv('DB_HOST'); }
  public static function dbUser() { return getenv('DB_USER'); }
  public static function dbPass() { return getenv('DB_PASS'); }
  public static function dbDatabase() { return getenv('DB_DATABASE'); }

  public static function localHost() { return getenv('LOCAL_HOST'); }
  public static function staticHost() { return getenv('STATIC_HOST'); }
  public static function productionHost() { return 'http://kinseyroberts.me'; }
  public static function hostUrl() { return Page::isStatic() ? self::staticHost() : self::localHost(); }

  // build configuration
  public static function minifyHtml() { return true; }
}
