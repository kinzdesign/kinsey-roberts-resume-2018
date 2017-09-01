<?php
class TenureType {

  /*
   * data access
   */
  private function __construct($row) {
    $this->id               = $row['id'];
    $this->name             = $row['name'];
    $this->slug             = $row['slug'];
    $this->showInNav        = $row['showInNav'] == 1;
    $this->showDuration     = $row['showDuration'] == 1;
    $this->schemaProperty   = $row['schemaProperty'];
    $this->schemaType       = $row['schemaType'];
  }

  /*
   * properties and getters
   */

  private $id,
          $name,
          $slug,
          $tenures,
          $showInNav,
          $showDuration,
          $schemaProperty,
          $schemaType;

  public function id() {
    return $this->id;
  }

  public function name() {
    return $this->name;
  }

  public function slug() {
    return $this->slug;
  }

  public function showInNav() {
    return $this->showInNav;
  }

  public function showDuration() {
    return $this->showDuration;
  }

  public function schemaProperty() {
    return $this->schemaProperty;
  }

  public function schemaType() {
    return $this->schemaType;
  }

  public function tenures() {
    // lazy-load Tenure array
    if(!$this->tenures)
      $this->tenures = Tenure::getByType($this);
    return $this->tenures;
  }

  public function url() {
    return "/{$this->slug()}/" . Page::cacheBreaker();
  }
  
  /*
   * data access
   */

  const SELECT = "SELECT id, name, slug, showInNav, showDuration, schemaProperty, schemaType FROM tenure_types ";
  const ORDER  = " ORDER BY displayorder ";

  public static function getAll() {
    $arr = array();
    $result = Database::execute(self::SELECT . self::ORDER);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getById($id) {
    $result = Database::execute(self::SELECT . ' WHERE id = ? ' . self::ORDER, $id);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }

  public static function getBySlug($slug) {
    $result = Database::execute(self::SELECT . ' WHERE slug = ? ' . self::ORDER, $slug);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }
}