<?php
class SkillType {

  /*
   * data access
   */
  private function __construct($row, $type = false) {
    $this->id           = $row['id'];
    $this->name         = $row['name'];
    $this->slug         = $row['slug'];
    $this->expanded     = $row['expanded'];
  }

  /*
   * properties and getters
   */

  private $id,
          $name,
          $slug,
          $expanded,
          $skills;

  public function id() {
    return $this->id;
  }

  public function name() {
    return $this->name;
  }

  public function slug() {
    return $this->slug;
  }

  public function expanded() {
    return $this->expanded;
  }

  public function skills() {
    // lazy-load Skill objects
    if(!$this->skills)
      $this->skills = Skill::getByType($this);
    return $this->skills;
  }

  public function url() {
    return "/skills/{$this->slug()}/" . Page::cacheBreaker();
  }

  public function queueBreadcrumb() {
    Page::$breadcrumbs[$this->name()] = $this->url();
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, name, slug, expanded " .
    "FROM skill_types ";
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