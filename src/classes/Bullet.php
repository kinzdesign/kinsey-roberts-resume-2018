<?php
class Bullet {

  /*
   * data access
   */
  private function __construct($row, $tenure = false) {
    $this->id             = $row['id'];
    $this->tenureId       = $row['tenure'];
    $this->tenure         = $tenure;
    $this->text           = Page::interpolateLinks($row['text']);
  }

  /*
   * properties and getters
   */

  private $id,
          $tenureId, $tenure,
          $text;

  public function id() {
    return $this->id;
  }

  public function tenureId() {
    return $this->tenureId;
  }
  
  public function tenure() {
    // lazy-load Tenure object
    if(!$this->tenure)
      $this->tenure = Tenure::getById($this->tenureId);
    return $this->tenure;
  }

  public function text() {
    return $this->text;
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, tenure, text FROM bullets ";
  const ORDER  = " ORDER BY tenure, displayorder";

  public static function getAll() {
    $arr = array();
    $result = Database::execute(self::SELECT . self::ORDER);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getById($id) {
    $result = Database::execute(self::SELECT . ' WHERE id = ? ', $id);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }

  public static function getByTenureId($tenureId) {
    $arr = array();
    $sql = self::SELECT . ' WHERE tenure = ? ' . self::ORDER;
    $result = Database::execute($sql, $tenureId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByTenure($tenure) {
    $arr = array();
    if($tenure) {
      $sql = self::SELECT . ' WHERE tenure = ? ' . self::ORDER;
      $result = Database::execute($sql, $tenure->id(), $tenure);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, $tenure);
    }
    return $arr;
  }

}