<?php
class Project {

  /*
   * data access
   */
  private function __construct($row, $tenure = false) {
    $this->id           = $row['id'];
    $this->tenureId     = $row['tenure'];
    $this->tenure       = $tenure;
    $this->name         = $row['name'];
    $this->slug         = $row['slug'];
    $this->synopsis     = Page::interpolateLinks($row['synopsis']);
  }

  /*
   * properties and getters
   */

  private $id,
          $tenureId, $tenure,
          $name,
          $synopsis,
          $slug,
          $skills;

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

  public function name() {
    return $this->name;
  }

  public function synopsis() {
    return $this->synopsis;
  }

  public function slug() {
    return $this->slug;
  }

  public function skills() {
    // lazy-load Skill objects
    if(!$this->skills)
      $this->skills = Skill::getByProject($this);
    return $this->skills;
  }

  public function url() {
    return "/{$this->tenure()->type()->slug()}/{$this->tenure()->slug()}/{$this->slug()}/" . Page::cacheBreaker();
  }

  public function queueBreadcrumb() {
    Page::$breadcrumbs[$this->name()] = $this->url();
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, tenure, name, slug, synopsis " .
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

  public static function getBySkillId($skillId) {
    $arr = array();
    $sql = self::SELECT . ' WHERE id IN (SELECT project FROM project_skills WHERE skill = ?) ' . self::ORDER;
    $result = Database::execute($sql, $skillId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getBySkill($skill) {
    $arr = array();
    if($skill) {
      $sql = self::SELECT . ' WHERE id IN (SELECT project FROM project_skills WHERE skill = ?) ' . self::ORDER;
      $result = Database::execute($sql, $skill->id(), $skill);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, $skill);
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