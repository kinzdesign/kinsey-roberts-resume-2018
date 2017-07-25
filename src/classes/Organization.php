<?php
class Organization {

  /*
   * data access
   */
  private function __construct($row) {
    $this->id             = $row['id'];
    $this->name           = $row['name'];
    $this->street1        = $row['street1'];
    $this->street2        = $row['street2'];
    $this->city           = $row['city'];
    $this->state          = $row['state'];
    $this->zip            = $row['zip'];
  }

  /*
   * properties and getters
   */

  private $id,
          $name,
          $street1,
          $street2,
          $city,
          $state,
          $zip;

  public function id() {
    return $this->id;
  }

  public function name() {
    return $this->name;
  }

  public function street1() {
    return $this->street1;
  }

  public function street2() {
    return $this->street2;
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

  const SELECT = "SELECT id, name, street1, name, street2, city, state, zip FROM organizations ";
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

  public static function getByStreet2($street2) {
    $result = Database::execute(self::SELECT . ' WHERE street2 = ? ', $street2);
    if($result && $row = $result->fetchRow())
      return new self($row);
    return false;
  }
}