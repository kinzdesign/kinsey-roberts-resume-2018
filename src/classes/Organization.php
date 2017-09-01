<?php
class Organization {

  /*
   * data access
   */
  private function __construct($row) {
    $this->id             = $row['id'];
    $this->name           = $row['name'];
    $this->street         = $row['street'];
    $this->city           = $row['city'];
    $this->state          = $row['state'];
    $this->zip            = $row['zip'];
  }

  /*
   * properties and getters
   */

  private $id,
          $name,
          $street,
          $city,
          $state,
          $zip;

  public function id() {
    return $this->id;
  }

  public function name() {
    return $this->name;
  }

  public function street() {
    return $this->street;
  }

  public function city() {
    return $this->city;
  }

  public function state() {
    return $this->state;
  }

  public function zip() {
    return $this->zip;
  }

  /*
   * data access
   */

  const SELECT = "SELECT id, name, street, city, state, zip FROM organizations ";
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