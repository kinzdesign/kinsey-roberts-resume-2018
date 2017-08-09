<?php
class Config {

  // timestamp of last build
  public static function getBuildTime() { return '1502322767'; }
  public static function echoBuildTime() { echo self::getBuildTime(); }

  // get database configuration variables
  public static function dbHost() { return getenv('DB_HOST'); }
  public static function dbUser() { return getenv('DB_USER'); }
  public static function dbPass() { return getenv('DB_PASS'); }
  public static function dbDatabase() { return getenv('DB_DATABASE'); }

}
