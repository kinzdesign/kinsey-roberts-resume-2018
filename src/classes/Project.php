<?php
class Project {

  /*
   * data access
   */
  private function __construct($row, $tenure = false) {
    $this->id           = $row['id'];
    $this->tenureId     = $row['tenure'];
    $this->tenure       = $tenure;
    $this->title        = $row['title'];
    $this->slug         = $row['slug'];
    $this->synopsis     = $row['synopsis'];
  }

  /*
   * properties and getters
   */

  private $id,
          $tenureId, $tenure,
          $title,
          $synopsis,
          $slug;

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

  public function title() {
    return $this->title;
  }

  public function synopsis() {
    return $this->synopsis;
  }

  public function slug() {
    return $this->slug;
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, tenure, title, slug, synopsis " .
    "FROM projects ";
  const ORDER  = " ORDER BY tenure, displayorder ";

  public static function getAll() {
    $arr = array();
    $result = Database::execute(self::SELECT . self::ORDER);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
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
          $arr[] = new self($row, false, $tenure);
    }
    return $arr;
  }

  public static function getById($id) {
    $sql = self::SELECT . ' WHERE id = ? ' . self::ORDER;
    $result = Database::execute($sql, $id);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }

  public static function getBySlug($slug) {
    $sql = self::SELECT . ' WHERE slug = ? ' . self::ORDER;
    $result = Database::execute($sql, $slug);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }
}