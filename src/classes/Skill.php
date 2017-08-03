<?php
class Skill {

  /*
   * data access
   */
  private function __construct($row, $type = false) {
    $this->id           = $row['id'];
    $this->typeId       = $row['type'];
    $this->type         = $type;
    $this->name         = $row['name'];
    $this->slug         = $row['slug'];
    $this->synopsis     = $row['synopsis'];
  }

  /*
   * properties and getters
   */

  private $id,
          $typeId, $type,
          $name,
          $synopsis,
          $slug,
          $projects;

  public function id() {
    return $this->id;
  }

  public function typeId() {
    return $this->typeId;
  }

  public function type() {
    // lazy-load SkillType object
    if(!$this->type)
      $this->type = SkillType::getById($this->typeId);
    return $this->type;
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

  public function projects() {
    // lazy-load Project objects
    if(!$this->projects)
      $this->projects = Project::getBySkill($this);
    return $this->projects;
  }

  public function url() {
    return "/skills/{$this->slug()}/" . Page::cacheBreaker();
  }

  /*
   * data access
   */

  const SELECT = "SELECT s.id, s.type, s.name, s.slug, s.synopsis " .
    "FROM skills s INNER JOIN skill_types t ON s.type = t.id ";
  const ORDER  = " ORDER BY COALESCE(t.displayorder, t.id), s.displayorder ";

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
    $sql = self::SELECT . ' WHERE s.type = ? ' . self::ORDER;
    $result = Database::execute($sql, $typeId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByType($type) {
    $arr = array();
    if($type) {
      $sql = self::SELECT . ' WHERE s.type = ? ' . self::ORDER;
      $result = Database::execute($sql, $type->id(), $type);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, false, $type);
    }
    return $arr;
  }

  public static function getByProjectId($projectId) {
    $arr = array();
    $sql = self::SELECT . ' WHERE s.id IN (SELECT skill FROM project_skills WHERE project = ?) ' . self::ORDER;
    $result = Database::execute($sql, $projectId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByProject($project) {
    $arr = array();
    if($project) {
      $sql = self::SELECT . ' WHERE s.id IN (SELECT skill FROM project_skills WHERE project = ?) ' . self::ORDER;
      $result = Database::execute($sql, $project->id(), $project);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, false, $project);
    }
    return $arr;
  }

  public static function getById($id) {
    $sql = self::SELECT . ' WHERE s.id = ? ' . self::ORDER;
    $result = Database::execute($sql, $id);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }

  public static function getBySlug($slug) {
    $sql = self::SELECT . ' WHERE s.slug = ? ' . self::ORDER;
    $result = Database::execute($sql, $slug);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }
}