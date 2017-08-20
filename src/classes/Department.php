<?php
class Department {

  /*
   * data access
   */
  private function __construct($row) {
    $this->id             = $row['id'];
    $this->organizationId = $row['organization'];
    $this->name           = $row['name'];
    $this->parent         = $row['parent'];
    $this->url            = $row['url'];
  }

  /*
   * properties and getters
   */

  private $id,
          $organizationId, $organization,
          $name,
          $parent,
          $url,
          $tenures,
          $months;

  public function id() {
    return $this->id;
  }

  public function organizationId() {
    return $this->organizationId;
  }

  public function organization() {
    // lazy-load Organization object
    if(!$this->organization)
      $this->organization = Organization::getById($this->organizationId);
    return $this->organization;
  }

  public function name() {
    return $this->name;
  }

  public function parent() {
    return $this->parent;
  }

  public function url() {
    return $this->url;
  }

  public function tenures() {
    // lazy-load Tenure array
    if(!$this->tenures)
      $this->tenures = Tenure::getByDepartment($this);
    return $this->tenures;
  }

  public function months() {
    if(!$this->months)
     $this->months = Database::getOne( 
      'SELECT  TIMESTAMPDIFF(MONTH, MIN(t.start), MAX(COALESCE(t.end, NOW()))) AS months ' .
      'FROM    tenures AS t ' .
              'INNER JOIN departments AS d ON t.department = d.id ' .
      'WHERE   d.id = ? ', $this->id());
    return $this->months;
  }

  public function duration() {
    return duration_string($this->months());
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, organization, name, parent, url FROM departments ";
  const ORDER  = " ORDER BY name";

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
}