<?php
class TenureType {

  /*
   * data access
   */
  private function __construct($row) {
    $this->id               = $row['id'];
    $this->name             = $row['name'];
    $this->shortName        = $row['shortName'];
    $this->slug             = $row['slug'];
    $this->showInNav        = $row['showInNav'] == 1;
    $this->showDuration     = $row['showDuration'] == 1;
    $this->showStartDate    = $row['showStartDate'] == 1;
    $this->nameProperty     = $row['nameProperty'];
    $this->deptProperty     = $row['deptProperty'];
    $this->deptType         = $row['deptType'];
  }

  /*
   * properties and getters
   */

  private $id,
          $name,
          $shortName,
          $slug,
          $tenures,
          $showInNav,
          $showDuration,
          $showStartDate,
          $nameProperty,
          $deptProperty,
          $deptType;

  public function id() {
    return $this->id;
  }

  public function name() {
    return $this->name;
  }

  public function shortName() {
    return $this->shortName;
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

  public function showStartDate() {
    return $this->showStartDate;
  }

  public function nameProperty() {
    return $this->nameProperty;
  }

  public function deptProperty() {
    return $this->deptProperty;
  }

  public function deptType() {
    return $this->deptType;
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

  public function queueBreadcrumb() {
    Page::$breadcrumbs[$this->name()] = $this->url();
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, name, slug, shortName, showInNav, showDuration, showStartDate, nameProperty, deptProperty, deptType ".
  "FROM tenure_types ";
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