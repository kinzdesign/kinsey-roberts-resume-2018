<?php
class Tenure {

  /*
   * data access
   */
  private function __construct($row, $type = false, $department = false) {
    $this->id           = $row['id'];
    $this->typeId       = $row['type'];
    $this->type         = $type;
    $this->departmentId = $row['department'];
    //$this->department   = $department;
    $this->title        = $row['title'];
    $this->slug         = $row['slug'];
    $this->category     = $row['category'];
    $this->notes        = $row['notes'];
    $this->start        = $row['start'];
    $this->end          = $row['end'];
  }

  /*
   * properties and getters
   */

  private $id,
          $typeId, $type,
          $departmentId, //$department,
          $title,
          $slug,
          $category,
          $notes,
          $start,
          $end;

  public function id() {
    return $this->id;
  }

  public function typeId() {
    return $this->typeId;
  }

  public function type() {
    // lazy-load TenureType object
    if(!$this->type)
      $this->type = TenureType::getById($this->typeId);
    return $this->type;
  }

  public function departmentId() {
    return $this->departmentId;
  }

  // public function department() {
  //   // lazy-load Department object
  //   if(!$this->department)
  //     $this->department = Department::getById($this->departmentId);
  //   return $this->department;
  // }

  public function title() {
    return $this->title;
  }

  public function slug() {
    return $this->slug;
  }

  public function category() {
    return $this->category;
  }

  public function notes() {
    return $this->notes;
  }

  public function start() {
    return $this->start;
  }

  public function end() {
    return $this->end;
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, type, department, title, slug, category, notes, start, end FROM tenures ";
  const ORDER  = " ORDER BY COALESCE(end, '2099-01-01') DESC ";

  public static function getAll() {
    $arr = array();
    $result = Database::execute(self::SELECT . self::ORDER);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByTypeId($typeId) {
    $arr = array();
    $sql = self::SELECT . ' WHERE type = ? ' . self::ORDER;
    $result = Database::execute($sql, $typeId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByType($type) {
    $arr = array();
    if($type) {
      $sql = self::SELECT . ' WHERE type = ? ' . self::ORDER;
      $result = Database::execute($sql, $type->id(), $type);
      //if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, $type);
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