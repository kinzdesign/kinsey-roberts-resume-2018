<?php
class Database {

  // reuse a single connection
  static $conn;

  public static function getConnection($debug = false) { 
    // connect if connection not configured
    if(!self::$conn) {
      // create connection
      self::$conn = newAdoConnection('mysqli');
      // fetch associated arrays by default
      self::$conn->setFetchMode(ADODB_FETCH_ASSOC);
      // connect using environment variables
      if(!self::$conn->connect(Config::dbHost(), Config::dbUser(), Config::dbPass(), Config::dbDatabase()))
        return false;
      // return connected connection object
    }
    // set debug flag
    self::$conn->debug = $debug;
    return self::$conn;
  }

}
