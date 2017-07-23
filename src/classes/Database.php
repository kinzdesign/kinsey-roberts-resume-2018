<?php
class Database {

  public static function getConnection() { 
    // create connection
    $db = newAdoConnection('mysqli');
    // fetch associated arrays by default
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    // connect using environment variables
    if(!$db->connect(Config::dbHost(), Config::dbUser(), Config::dbPass(), Config::dbDatabase()))
      return false;
    // return connected connection object
    return $db;
  }

  public static function execute($sql, $inputarr = false) {
    return self::getConnection()->execute($sql, $inputarr);
  }

  public static function getAll($sql, $inputarr = false) {
    return self::getConnection()->getAll($sql, $inputarr);
  }

  public static function getAssoc($sql, $inputarr = false, $force_array = false, $first2cols = false) {
    return self::getConnection()->getAssoc($sql, $inputarr, $force_array, $first2cols);
  }

  public static function getCol($sql, $inputarr = false, $trim = false) {
    return self::getConnection()->getCol($sql, $inputarr, $trim);
  }

  public static function getOne($sql, $inputarr = false) {
    return self::getConnection()->getOne($sql, $inputarr);
  }

  public static function getRow($sql, $inputarr = false) {
    return self::getConnection()->getRow($sql, $inputarr);
  }

}
