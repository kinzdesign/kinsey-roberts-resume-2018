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
    $this->synopsis     = Page::interpolateLinks($row['synopsis']);
    $this->hasProjects  = $row['hasProjects'] == '1';
    $this->hasTenures   = $row['hasTenures'] == '1';
  }

  /*
   * properties and getters
   */

  private $id,
          $typeId, $type,
          $name,
          $synopsis,
          $slug,
          $projects,
          $hasProjects,
          $tenures,
          $hasTenures;

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
    if($this->hasProjects && !$this->projects)
      $this->projects = Project::getBySkill($this);
    return $this->projects;
  }

  public function hasProjects() {
    return $this->hasProjects;
  }

  public function tenures() {
    // lazy-load Tenure objects
    if($this->hasTenures && !$this->tenures)
      $this->tenures = Tenure::getBySkillId($this->id());
    return $this->tenures;
  }

  public function hasTenures() {
    return $this->hasTenures;
  }

  public function hasPartial() {
    return Page::partialExists('skills', $this->slug());
  }

  public function showLink() {
    return 
      $this->synopsis() ||
      $this->hasPartial() || 
      $this->hasTenures() || 
      $this->hasProjects();
  }
  
  public function canonicalUrl() {
    return "/skills/{$this->type()->slug()}/{$this->slug()}/";
  }

  public function url() {
    return $this->canonicalUrl() . Page::cacheBreaker();
  }

  public function queueBreadcrumb() {
    Page::$breadcrumbs[$this->name()] = $this->url();
  }

  public static function queueSkillsBreadcrumb() {
    Page::$breadcrumbs['Skills'] = '/skills/' . Page::cacheBreaker();
  }

  /*
   * data access
   */

  const SELECT = "SELECT s.id, s.type, s.name, s.slug, s.synopsis, " .
    "EXISTS(SELECT * FROM project_skills ps WHERE ps.skill = s.id) AS hasProjects, " .
    "EXISTS(SELECT * FROM tenure_skills ts WHERE ts.skill = s.id) AS hasTenures " .
    "FROM skills s INNER JOIN skill_types t ON s.type = t.id ";
  const ORDER  = " ORDER BY COALESCE(t.displayorder, t.id), COALESCE(s.displayorder, s.id) ";

  const PROJECT_SELECT = self::SELECT . ' WHERE s.id IN (SELECT skill FROM project_skills WHERE project = ?) ' . self::ORDER;
  const TENURE_SELECT = self::SELECT . ' WHERE s.id IN (SELECT skill FROM project_skills WHERE project IN (SELECT id FROM projects WHERE tenure = ?)) OR s.id IN (SELECT skill FROM tenure_skills WHERE tenure = ?) ' . self::ORDER;

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
    $result = Database::execute(self::PROJECT_SELECT, $projectId);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByProject($project) {
    $arr = array();
    if($project) {
      $result = Database::execute(self::PROJECT_SELECT, $project->id(), $project);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, false, $project);
    }
    return $arr;
  }

  public static function getByTenureId($tenureId) {
    $arr = array();
    $result = Database::execute(self::TENURE_SELECT, [$tenureId, $tenureId]);
    if($result)
      while($row = $result->fetchRow()) 
        $arr[] = new self($row);
    return $arr;
  }

  public static function getByTenure($tenure) {
    $arr = array();
    if($tenure) {
      $result = Database::execute(self::TENURE_SELECT, [$tenure->id(), $tenure->id()]);
      if($result)
        while($row = $result->fetchRow()) 
          $arr[] = new self($row, false);
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