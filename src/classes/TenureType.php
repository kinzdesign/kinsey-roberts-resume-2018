<?php
class TenureType {

  /*
   * data access
   */
  private function __construct($row) {
    $this->id = $row['id'];
    $this->name = $row['name'];
    $this->slug = $row['slug'];
  }

  /*
   * properties and getters
   */

  private $id,
          $name,
          $slug;

  public function id() {
    return $this->id;
  }

  public function name() {
    return $this->name;
  }

  public function slug() {
    return $this->slug;
  }

  /*
   * data access
   */

  const SELECT = 'SELECT tt.id, tt.name, tt.slug FROM tenure_types tt ';
  const ORDER = ' ORDER BY tt.displayorder ';

  public static function getAll() {
    $result = Database::execute(self::SELECT . self::ORDER);
    $arr = array();
    while($row = $result->fetchRow()) 
      $arr[] = new self($row);
    return $arr;
  }

  public static function getById($id) {
    $result = Database::execute(self::SELECT . ' WHERE id = ? ' . self::ORDER, $id);
    if($row = $result->fetchRow())
      return new self($row);
    return false;
  }

  public static function getBySlug($slug) {
    $result = Database::execute(self::SELECT . ' WHERE slug = ? ' . self::ORDER, $slug);
    if($row = $result->fetchRow())
      return new self($row);
    return false;
  }
}