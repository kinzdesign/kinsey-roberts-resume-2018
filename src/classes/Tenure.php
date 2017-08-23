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
    $this->department   = $department;
    $this->name         = $row['name'];
    $this->slug         = $row['slug'];
    $this->category     = $row['category'];
    $this->synopsis     = Page::interpolateLinks($row['synopsis']);
    $this->url          = $row['url'];
    $this->start        = $row['start'];
    $this->end          = $row['end'];
    $this->months       = $row['months'];
    $this->showInNav    = $row['showInNav'] == 1;
  }

  /*
   * properties and getters
   */

  private $id,
          $typeId, $type,
          $departmentId, $department,
          $name,
          $slug,
          $category,
          $synopsis,
          $url,
          $start,
          $end,
          $months,
          $bullets,
          $projects,
          $showInNav,
          $skills;

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

  public function department() {
    // lazy-load Department object
    if(!$this->department)
      $this->department = Department::getById($this->departmentId);
    return $this->department;
  }

  public function name() {
    return $this->name;
  }

  public function slug() {
    return $this->slug;
  }

  public function skills() {
    // lazy-load Skill objects
    if(!$this->skills)
      $this->skills = Skill::getByTenure($this);
    return $this->skills;
  }

  public function category() {
    return $this->category;
  }

  public function synopsis() {
    return $this->synopsis;
  }

  public function start() {
    return $this->start;
  }

  public function end() {
    return $this->end;
  }

  public function months() {
    return $this->months;
  }

  public function showInNav() {
    return $this->showInNav;
  }

  public function duration() {
    return duration_string($this->months());
  }

  public function bullets() {
    // lazy-load Bullet objects
    if(!$this->bullets)
      $this->bullets = Bullet::getByTenure($this);
    return $this->bullets;
  }

  public function projects() {
    // lazy-load Project objects
    if(!$this->projects)
      $this->projects = Project::getByTenure($this);
    return $this->projects;
  }

  public function hasUrl() {
    return !(!$this->url);
  }

  public function url() {
    return $this->url ?? ("/{$this->type()->slug()}/{$this->slug()}/" . Page::cacheBreaker());
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, type, department, name, slug, category, synopsis, showInNav, url, " .
    "MonthYearOrPresent(start) start, MonthYearOrPresent(end) end, " .
    "TIMESTAMPDIFF(MONTH, start, COALESCE(end, NOW())) AS months " .
    "FROM tenures ";
  const ORDER  = " ORDER BY COALESCE(end, '2099-01-01') DESC, tenures.start DESC ";

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
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, $type);
    }
    return $arr;
  }

  public static function getByDepartmentId($departmentId) {
    $arr = array();
    $sql = self::SELECT . ' WHERE department = ? ' . self::ORDER;
    $result = Database::execute($sql, $departmentId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByDepartment($department) {
    $arr = array();
    if($department) {
      $sql = self::SELECT . ' WHERE department = ? ' . self::ORDER;
      $result = Database::execute($sql, $department->id(), $department);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, false, $department);
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